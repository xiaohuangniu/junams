<?php
// +----------------------------------------------------------------------
// | 权限菜单管理模块
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

class Menu extends Backend{
    protected $DB;

    /**
     * 初始化定义数据模型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
		parent::_initialize();  
        $this->DB = Db::name('menu');
    }

    /**
     * 权限列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        # 获取上级权限节点
        $pid  = Request::instance()->param('pid', 0);
        $list = $this->DB
                ->field('A.*, B.e_edition')
                ->alias('A')
                ->join('__EDITION__ B', 'A.e_id = B.e_id')
                ->where('A.m_pid', $pid)
                ->select();
        $this->assign('list', $list);

        # 获取所有权限列表
        $list = $this->DB->field('m_id as id, m_name as name,  m_pid as pid')->select();
        $this->assign('json', menuFor($list) );
        
        # 获取1级权限个数
        $num  = $this->DB->where('m_pid = 0')->count();
        $this->assign('num', $num);
        return $this->fetch();
    }

    /**
     * 新增权限菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.28
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name = Request::instance()->post('name');
            $pid  = Request::instance()->post('pid');
            $app         = Request::instance()->post('app');
            $controller  = Request::instance()->post('controller');
            $action      = strtolower(Request::instance()->post('action'));
            $type        = Request::instance()->post('type',2);
            $sort        = Request::instance()->post('sort');
            $status      = Request::instance()->post('status',2);
            $display     = Request::instance()->post('display',2);
            $remark      = Request::instance()->post('remark');
            $icon        = Request::instance()->post('icon');
            $edition     = Request::instance()->post('edition');
            if (empty($name)) {$this->json('01','权限名称不能为空！');}
            $data = [
                'm_pid'       => $pid,
                'm_name'      => $name,
                'm_app'       => $app,
                'm_controller'=> $controller,
                'm_action'    => $action,
                'm_type'      => $type,
                'm_display'   => $display,
                'm_status'    => $status,
                'm_icon'      => $icon,
                'm_sort'      => $sort,
                'm_remark'    => $remark,
                'e_id'        => $edition,
            ];
            
            # 控制器文件地址
            $path =  ROOT_PATH.'application'.DS.'admin'.DS.'controller'.DS.ucfirst($controller).'.php';
            if (!empty($controller)) {
                # 不存在则创建
                if (!file_exists($path)) {
                    $content = <<<EOF
<?PHP
// +----------------------------------------------------------------------
// | {$name} - 控制器
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

class {$controller} extends Backend{

}
EOF;
                    $fp = fopen($path,"w");
                    fputs($fp, $content);
                    fclose($fp);
                }
            }
            
            if (!empty($action)) {
                # 检测方法名称是否存在
                $obj = new \org\Fileroot();
                $list = $obj->getList($path);
                $i_status = true;
                foreach ($list as $v) {
                    if ($v['class'] == $action) {
                        $i_status = false;
                        break;
                    }
                }
                # 不存在则创建
                if ($i_status) {
                    $edition_name = Db::name('edition')->where('e_id', $edition)->value('e_edition');
                    $date    = date('Y.m.d');
                    $content = file_get_contents($path);
                    $length  = strripos($content, '}');
                    $content = substr($content,0,$length);
                    $content .= <<<EOF
    
    /**
     * {$name}
     * @todo 无
     * @author 小黄牛
     * @version {$edition_name} + {$date}
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function {$action}() {

    }        
EOF;
                    $fp = fopen($path,"w");
                    fputs($fp, $content."\n".'}');
                    fclose($fp);
                }
            }
            $id  = $this->DB->insertGetId($data);
            # 顶级栏目
            if ($pid == 0) {
                $upd_data = ['m_path' => $id];
            # 次级栏目
            }else{
                $m_path = $this->DB->where('m_id', $pid)->value('m_path');
                $upd_data = ['m_path' => $m_path.'/'.$id];
            }
            $res =  $this->DB->where('m_id', $id)->update($upd_data);
            if ($res > 0) {
                $this->addLog(22, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(22, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
            # 获取上级权限节点
            $pid  = Request::instance()->param('pid', 0);
            $this->assign('pid', $pid);
			if ($pid == 0) {
                $this->assign('name', '顶级菜单');
                $this->assign('i_controller', '');
            }else{
                $res = $this->DB->where('m_id', $pid)->field('m_name,m_controller')->find();
                $this->assign('name', $res['m_name']);
                $this->assign('i_controller', $res['m_controller']);
            }
            
            # 获取版本列表
            $edition = Db::name('edition')->field('e_id,e_edition')->order('e_id desc')->select();
            $this->assign('edition', $edition);
            
			return $this->fetch();
		}
    }

    /**
     * 删除权限菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public function del(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('id');
            $info = $this->DB->where('m_pid', $id)->find();
            if ($info) {
                $this->addLog(24, '还存在下级权限，不允许删除', 3, false);
                $this->json('01', '还存在下级权限，不允许删除');
            }

            $res = $this->DB->where('m_id', $id)->delete();
            if ($res) {
                $this->addLog(24, '删除成功', 1, false);
                $this->json('00', '删除成功');
            }

            $this->addLog(24, '删除失败', 2, false);
            $this->json('01', '删除失败');
        }
    }

    /**
     * 修改权限菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.28
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('id');
            $name = Request::instance()->post('name');
            $pid  = Request::instance()->post('pid');
            $app         = Request::instance()->post('app');
            $controller  = Request::instance()->post('controller');
            $action      = strtolower(Request::instance()->post('action'));
            $type        = Request::instance()->post('type');
            $sort        = Request::instance()->post('sort');
            $status      = Request::instance()->post('status');
            $display     = Request::instance()->post('display');
            $remark      = Request::instance()->post('remark');
            $icon        = Request::instance()->post('icon');
            $edition     = Request::instance()->post('edition');

            $m_pid       = $this->DB->where('m_id', $id)->value('m_pid');
            if ($pid != $m_pid) {
                $info = $this->DB->where('m_pid', $id)->find();
                if ($info) {
                    $this->addLog(23, '该权限分类下还存在子权限，不允许修改上级权限', 3, false);
                    $this->json('01', '该权限分类下还存在子权限，不允许修改上级权限');
                }
            }

            $m_path      = $this->DB->where('m_id', $pid)->value('m_path');

            $upd_data    = [
                'm_name'      => $name,
                'm_pid'       => $pid,
                'm_app'       => $app,
                'm_controller'=> $controller,
                'm_action'    => $action,
                'm_type'      => $type,
                'm_display'   => $display,
                'm_status'    => $status,
                'm_icon'      => $icon,
                'm_sort'      => $sort,
                'm_remark'    => $remark,
                'e_id'        => $edition,
                'm_path'      => $m_path.'/'.$id,
            ];
            
            $res =  $this->DB->where('m_id', $id)->update($upd_data);
            if ($res > 0) {
                $this->addLog(23, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(23, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            # 获取ID
            $id   = Request::instance()->param('pid');
            $res  = $this->DB->where('m_id', $id)->find();
            # 获取上级权限节点
            $name = $this->DB->where('m_id', $res['m_pid'])->value('m_name');
            $name = $name?:'顶级菜单';
            $this->assign('id', $id);
            $this->assign('name', $name);
            $this->assign('info', $res);

            # 获取版本列表
            $edition = Db::name('edition')->field('e_id,e_edition')->order('e_id desc')->select();
            $this->assign('edition', $edition);
			return $this->fetch();
		}
    }

    /**
     * Icon参考表（公共）
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function icon(){
		return $this->fetch();
    }
}