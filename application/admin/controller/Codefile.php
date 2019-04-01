<?php
// +----------------------------------------------------------------------
// | CMS模块 - 代码管理
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\common\controller\Backend;
use think\Db;
use think\Request;

class Codefile extends Backend{
    /*
     * 当前项目信息
    */
    private $item;
    /*
     * 当前项目对应的控制器地址
    */
    private $controller_path;
    /*
     * 当前项目对应的PC视图地址
    */
    private $view_path;
    /*
     * 当前项目对应的WAP视图地址
    */
    private $wap_path;

    /**
     * 初始化定义数据
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
        parent::_initialize();  
        $this->item = Db::name('item')->where('i_status', 1)->field('i_id, i_path')->find();
        $A = ROOT_PATH .'application'. DS .$this->item['i_path']. DS;
        $this->controller_path = $A.'controller'.DS;
        $this->view_path = $A.'view'.DS;
        $this->wap_path = $A.'wap'.DS;
    }

    /**
     * ILDM列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){ 
        $list = Db::name('item_content')->where('i_id', $this->item['i_id'])->group('ic_name')->select();
        $this->assign('list', $list);
        $this->assign('item', $this->item);
        $this->assign('controller', $this->controller_path);
        $this->assign('pc', $this->view_path);
        $this->assign('wap', $this->wap_path);
        return $this->fetch();
    }

    /**
     * 修改代码
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd() {
        $name = Request::instance()->param('name');
        $url  = url_tran($name, true);
        $class = pathinfo($url, PATHINFO_EXTENSION);

        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $content = Request::instance()->param('content');
            $type = Request::instance()->param('type');
            # 检查服务器的自动反斜杠功能是否开启
            if (!get_magic_quotes_gpc()) {
				$txt = $content;
			}else{
				$txt = stripslashes($content);
            }	
            
            # 判断备份选项是否被选中
            if ($type == 1) {
                # 选中备份的处理
                date_default_timezone_set ("PRC");                                                           //声明中国时区
                $leng = strlen($url);                                                                        //获取url长度
                # 拼接新的url
                if ($class == 'php') {
                    $q = substr($url,0,$leng-4).'_'.date('YmdHis',time()).substr($url, -4);                 
                } else {
                    $q = substr($url,0,$leng-5).'_'.date('YmdHis',time()).substr($url, -5);
                }
                $backups = copy($url, $q);                                                                    //备份文件
                if (!$backups){                                                                               //判断备份是否成功
                    $this->addLog(70, '原文件备份失败', 2, false);
                    $this->json('01', '原文件备份失败');
                }
            }
            # 修改文件
            $fp = fopen($url,'w');
            $res = fputs($fp,$txt);
            fclose($fp);
            if (!$res) {
                $this->addLog(70, '修改失败', 2, false);
                $this->json('01', '修改失败');
            }

            $this->addLog(70, '修改成功', 1, false);
            $this->json('00', '修改成功');
        }
        $this->assign('url', $url);
        $this->assign('type', $class);
        $this->assign('list', $this->get_backups($url, $class));
        return $this->fetch();
    }

    /**
     * 修改代码
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $url = Request::instance()->param('name');
        $url = url_tran($url, true);
        $res = @unlink($url);
        
        if (!$res) {
            $this->addLog(71, '备份删除失败', 2, false);
            $this->json('01', '备份删除失败');
        }

        $this->addLog(71, '备份删除成功', 1, false);
        $this->json('00', '备份删除成功');
    }

    /**
     * 恢复备份文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function restore() {
        $name = Request::instance()->param('name');
        $name = url_tran($name, true);
        $url = Request::instance()->param('url');
        $url = url_tran($url, true);
        # 读取备份内容
        $txt = file_get_contents($name);
        # 修改文件
        $fp = fopen($url,'w');
        $res = fputs($fp, $txt);
        fclose($fp);
        if (!$res) {
            $this->addLog(72, '备份恢复失败', 2, false);
            $this->json('01', '备份恢复失败');
        }

        $this->addLog(72, '备份恢复成功', 1, false);
        $this->json('00', '备份恢复成功');
    }

    /**
     * 读取文件对应的备份列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 文件路径
     * @param string $class 文件后缀
     * @return array
    */
    private function get_backups($url, $class) {
        $url    = str_replace('.'.$class, '', $url);
        $length = strrpos($url, DS);
        $path   = substr($url,0,$length+1);
        $name   = substr($url,$length+1, 100);
        $list   = [];

        if($dns = @opendir($path)){
            while(($file = readdir($dns)) !== false){
                if($file != '.' && $file != '..') {
                    # 只读取备份文件
                    if (stripos($file, $name.'_') !== false) {
                        $data = [];
                        $data['url'] = $path.$file;
                        $data['name'] = $file;
                        $data['time'] = strtotime(str_replace(['.'.$class, $name.'_'], '', $file));
                        $list[] = $data;
                    }
                }
            }
            closedir($dns);
        }

        return array_reverse($list);
    }


}