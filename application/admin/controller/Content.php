<?php
// +----------------------------------------------------------------------
// | CMS模块 - ILDM管理
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

class Content extends Backend{
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
    /*
     * 递归生成下拉菜单
    */
    private $html;
    /*
     * 递归生成文章列表
    */
    private $list = [];

    /**
     * 初始化定义数据
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
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
     * 生成文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $int 是否兼容手机端
     * @param string $name 控制器名称
     * @param string $content 控制器内容
     * @return void
    */
    private function add_path($wap, $name, $content) {
        # 先生成控制器
        $fp=fopen($this->controller_path.$name.'.php',"w");
        $res=fputs($fp,$content);
        if($res==false){$this->json('01','控制器文件生成失败!');}
        fclose($fp);

        $name = strtolower($name);
        # 先生成PC端视图文件夹
        if (!file_exists($this->view_path.$name)) {
            $res = mkdir($this->view_path.$name, 0777);
            chmod($this->view_path.$name, 0777);
            if($res==false){$this->json('01','视图文件夹生成失败!');}
        }
        

        # 先生成PC端视图文件
        # PC:Marketing页面
        $fp = fopen($this->view_path.$name.DS.'marketing.html',"w");
        $res = fputs($fp, '欢迎使用JunAMS系统，当前是marketing页面！');
        if($res==false){$this->json('01','PC端：Marketing页面生成失败!');}
        fclose($fp);
        # PC:Index页面
        $fp = fopen($this->view_path.$name.DS.'index.html',"w");
        $res = fputs($fp, '欢迎使用JunAMS系统，当前是index页面！');
        if($res==false){$this->json('01','PC端：Index页面生成失败!');}
        fclose($fp);
        # PC:Showlist页面
        $fp = fopen($this->view_path.$name.DS.'showlist.html',"w");
        $res = fputs($fp, '欢迎使用JunAMS系统，当前是showlist页面！');
        if($res==false){$this->json('01','PC端：Showlist页面生成失败!');}
        fclose($fp);
        # PC:Details页面
        $fp = fopen($this->view_path.$name.DS.'details.html',"w");
        $res = fputs($fp, '欢迎使用JunAMS系统，当前是details页面！');
        if($res==false){$this->json('01','PC端：Details页面生成失败!');}
        fclose($fp);
        
        # 创建手机版
        if ($wap == 1) {
            # 先生成WAP端视图文件夹
            if (!file_exists($this->wap_path.$name)) {
                $res = mkdir($this->wap_path.$name);
                chmod($this->wap_path.$name, 0777);
                if($res==false){$this->json('01','视图文件夹生成失败!');}
            }
            
            # 先生成wap端视图文件
            # WAP:Marketing页面
            $fp = fopen($this->wap_path.$name.DS.'marketing.html',"w");
            $res = fputs($fp, '欢迎使用JunAMS系统，当前是marketing页面！');
            if($res==false){$this->json('01','WAP端：Marketing页面生成失败!');}
            fclose($fp);
            # WAP:Index页面
            $fp = fopen($this->wap_path.$name.DS.'index.html',"w");
            $res = fputs($fp, '欢迎使用JunAMS系统，当前是index页面！');
            if($res==false){$this->json('01','WAP端：Index页面生成失败!');}
            fclose($fp);
            # WAP:Showlist页面
            $fp = fopen($this->wap_path.$name.DS.'showlist.html',"w");
            $res = fputs($fp, '欢迎使用JunAMS系统，当前是showlist页面！');
            if($res==false){$this->json('01','WAP端：Showlist页面生成失败!');}
            fclose($fp);
            # WAP:Details页面
            $fp = fopen($this->wap_path.$name.DS.'details.html',"w");
            $res = fputs($fp, '欢迎使用JunAMS系统，当前是details页面！');
            if($res==false){$this->json('01','WAP端：Details页面生成失败!');}
        }
    }

    /**
     * 生成option
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $pid 不做查询的自身ID
     * @param string $xid 默认被选中的ID
     * @return void
    */
    private function menu($pid = 0, $xid='', $status = false) {
        if (!$status) {
            $list = Db::name('item_content')->where("ic_id != '{$pid}'")->field('ic_id, ic_pid, ic_title')->select();
            $this->getTree($list,$xid, $status);
            return $this->html;
        }

        $list = Db::name('item_content')
                ->alias('A')
                ->field('A.*, B.im_name')
                ->join('__ITEM_MODEL__ B', 'A.im_id = B.im_id')
                ->select();
        $this->getTree($list,$xid, $status);
        return $this->list;
    }

    /**
     * 递归生成分类
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private function getTree($item=[],$xid, $status = false, $pid=0,$sub='sub',$level=0) {  
        $data = array();  
        foreach($item as $key=>$val){
            if (!$status) {
                $selected = '';
                if ($val['ic_id'] == $xid) {
                    $selected = ' selected';
                }
                if($val['ic_pid']==$pid){
                    $val['level']=$level;
                    $this->html .= '<option value="'.$val['ic_id'].'" '.$selected.'>';
                    for ($i=0; $i<$level; $i++) {
                        $this->html .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    $this->html .= $val['ic_title'].'</option>';
                    $val[$sub]=$this->getTree($item,$xid,$status,$val['ic_id'],'sub',$level+1);
                    $data[] = $val;
                } 
            } else {
                if($val['ic_pid']==$pid){
                    $val['level']=$level;
                    $html = '';
                    for ($i=0; $i<$level; $i++) {
                        $html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    $val['ic_title'] = $html.$val['ic_title'];
                    $this->list[] = $val;
                    $val[$sub]=$this->getTree($item,$xid,$status,$val['ic_id'],'sub',$level+1);
                    $data[] = $val;
                } 
            }
        } 
        return $data;  
    }

    /**
     * 删除目录及目录下所有文件或删除指定文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $path 待删除目录路径
     * @param int $delDir 是否删除目录
     * @return void
    */
    private function delDirAndFile($path, $delDir = false) {
        $message = "";
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$path/$item")) {
                        $msg = $this->delDirAndFile($path.$item, $delDir);
                        if ( $msg ){
                            $message .= $msg;
                        }
                    } else {
                        unlink($path.$item);
                    }
                }
            }
            closedir($handle);
        } else {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /**
     * 验证模型是否共用，共用的控制器名称
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function vif_model() {
        $id = Request::instance()->param('id');
        $im_type = Db::name('item_model')->where('im_id', $id)->value('im_type');
        if ($im_type != 1) {
            $ic_name = Db::name('item_content')->where('im_id', $id)->value('ic_name');
            if ($ic_name) {
                $this->json('00', '该模型共用模板', $ic_name);
            } else {
                $this->json('02', '该模型下尚未创建过控制器');
            }
        }
        $this->json('01', '所属分离模型');
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
        $list = $this->menu(0,'',true);
		$this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 创建新ILDM
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $title = Request::instance()->post('title');
            $name  = ucfirst(strtolower(Request::instance()->post('name')));
            $des   = Request::instance()->post('des');
            $im_id = Request::instance()->post('im_id');
            $pid   = Request::instance()->post('pid');
            $wap   = Request::instance()->post('wap');
            $time  = time();
            $item  = $this->item['i_path'];

            $where = [
                'i_id'    => $this->item['i_id'],
                'ic_name' => $name,
            ];
            
            $DB     = Db::name('item_content');
            if ($name == 'index' || $name == 'main') {
                $this->json('01', '项目目录不能为 index、main'); 
            }

            if (empty($title) || empty($name) || empty($im_id)) {
                $this->json('01', '请填写相关信息！');
            }

            $iswap = <<<EOF
    /**
     * 初始化
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不启用
     * @global 无
     * @return void
    */
    public function _initialize() {
        parent::_initialize();
        # 判断手机端，切换对应的模板
        if (\\think\Request::instance()->isMobile())
            \$this->view->config('view_path', dirname(dirname(__FILE__)).DS.'wap'.DS);
        }
    }            
EOF;
        if ($wap != 1) {
            $iswap = '';
        }

            //定义控制的内容
            $content = <<<EOF
<?php
// +----------------------------------------------------------------------
// | {$title} - {$des} - JunAMS内容管理系统
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\\{$item}\controller;

use app\common\controller\Main;

class {$name} extends Main {

{$iswap}

    /**
     * 主页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        return \$this->fetch();
    }

    /**
     * 列表页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function showlist() {
        return \$this->fetch();
    }

    /**
     * 详情页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details() {
        return \$this->fetch();
    }

    /**
     * 营销页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function marketing() {
        return \$this->fetch();
    }
}         
EOF;
            # 查询模型信息
            $model = Db::name('item_model')->where('im_id', $im_id)->find();
            if ($model['im_status'] != 1) {
                $this->json('01', '该数据模型已被禁用');
            }
            # 判断是分离还是共用
            if ($model['im_type'] == 1) {
                # 判断控制器是否已被使用
                if ($DB->where($where)->value('ic_id')) {
                    $this->addLog(59, '控制器名称已存在', 3, false);
                    $this->json('01', '控制器名称已存在');
                }
                $this->add_path($wap, $name, $content);
            # 共用模型
            } else {
                $where = [
                    'i_id'  => $this->item['i_id'],
                    'im_id' => $im_id,
                ];
                $res = Db::name('item_content')->where($where)->value('ic_id');
                if (!$res) {
                    # 判断控制器是否已被使用
                    if ($DB->where($where)->value('ic_id')) {
                        $this->addLog(59, '控制器名称已存在', 3, false);
                        $this->json('01', '控制器名称已存在');
                    }
                    $this->add_path($wap, $name, $content);
                }
            }

            # 入库做记录
            $data = [
                'ic_id'       => uniqid(),
                'ic_pid'      => $pid,
                'i_id'        => $this->item['i_id'],
                'im_id'       => $im_id,
                'ic_title'    => $title,
                'ic_name'     => $name,
                'ic_des'      => $des,
                'ic_wap'      => $wap,
                'ic_author'   => $this->admin['m_nice'],
                'ic_add_time' => time(),
            ];

            $res = Db::name('item_content')->insert($data);
            if ($res) {
                $this->addLog(59, '创建成功', 1, false);
                $this->json('00', '创建成功');
            }

            $this->addLog(59, '创建失败', 2, false);
            $this->json('01', '创建失败');
        } else {
            $model = Db::name('item_model')->where('i_id', $this->item['i_id'])->select();
            $this->assign('model', $model);
            $this->assign('html', $this->menu());
			return $this->fetch();
		}
    }

    /**
     * 删除ILDM
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id   = Request::instance()->param('id');
        $info = Db::name('item_content')->where('ic_id', $id)->find();
        if (!$info) $this->json('01', '数据不存在！');
        $list = Db::name('item_content')->where('ic_pid', $id)->find();
        if ($list) $this->json('01', '该ILDM下还存在子分类，请先删除！');

        $im_type = Db::name('item_model')->where('im_id', $info['im_id'])->value('im_type');
        # 获得对应模型的总条数
		$length = Db::name('item_content')->where('im_id', $info['im_id'])->count();
        if ($im_type == 1 || ($im_type == 0 && $length == 1)) {
            //删除控制器
			$res = unlink($this->controller_path.ucfirst($info['ic_name']).'.php');
            //删除PC端模板文件
            $path = $this->view_path.strtolower($info['ic_name']).DS;
            $res = $this->delDirAndFile($path, true);
            @chmod($path,0777);
            @unlink($path);
            if ($info['ic_wap'] == 1) {
                //删除WAP端模板文件
                $path = $this->wap_path.strtolower($info['ic_name']).DS;
                $res = $this->delDirAndFile($path, true);
                @chmod($path,0777);
                @unlink($path);
            }
        }

        # 删除控制器，但不删除数据
        $res = Db::name('item_content')->where('ic_id', $id)->delete();
        if ($res) {
            $this->addLog(60, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }
        $this->addLog(60, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }

    /**
     * 修改项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('id');
        $DB   = Db::name('item_content');
        $res  = $DB->where('ic_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $title = Request::instance()->post('title');
            $des   = Request::instance()->post('des');
            $pid   = Request::instance()->post('pid');

            # 入库做记录
            $data = [
                'ic_pid'      => $pid,
                'ic_title'    => $title,
                'ic_des'      => $des,
            ];
            
            $res =  $DB->where('ic_id', $id)->update($data);
            if ($res > 0) {
                $this->addLog(61, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(61, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $this->assign('info', $res);
            $this->assign('html', $this->menu($id, $res['ic_pid']));
			return $this->fetch();
		}
    }

}