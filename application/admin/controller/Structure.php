<?php
// +----------------------------------------------------------------------
// | 部门管理模块
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

class Structure extends Backend{
    protected $DB; // 组织表

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
        $this->DB = Db::name('structure');
    }
    
    /**
     * 部门列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        # 获取所有部门列表
        $list = $this->DB->field('s_id as id, s_name as name,  s_pid as pid')->select();
        $this->assign('json', menuFor($list) );
        return $this->fetch();
    }

    /**
     * 删除部门
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('id');
            $info = $this->DB->where('s_pid', $id)->find();
            if ($info) {
                $this->addLog(18, '还存在下级部门，不允许删除', 3, false);
                $this->json('01', '还存在下级部门，不允许删除');
            }

            # 这里判断一下对应的岗位是否已经关联了这个部门

            $res = $this->DB->where('s_id', $id)->delete();
            if ($res) {
                $this->addLog(18, '删除成功', 1, false);
                $this->json('00', '删除成功');
            }

            $this->addLog(18, '删除失败', 2, false);
            $this->json('01', '删除失败');
        }
    }

    /**
     * 修改部门
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$id     = Request::instance()->post('id');
			$pid    = Request::instance()->post('pid');
            $code   = Request::instance()->post('code');
			$name   = Request::instance()->post('name');
            $sort   = Request::instance()->post('sort');
            $role   = Request::instance()->post('role');
            $remark = Request::instance()->post('remark');

            # 简单过滤数据
            if (empty($name)) {
                $this->addLog(17, '部门名称不能为空', 3, false);
                $this->json('01', '部门名称不能为空');
            }
            if (empty($role)) {
                $this->addLog(17, '请选择对应的角色', 3, false);
                $this->json('01', '请选择对应的角色');
            }
           
			$data = [
                's_pid'    => $pid,
                's_name'   => $name,
                's_code'   => $code,
                's_sort'   => $sort,
                'r_id'     => $role,
                's_remark' => $remark,
            ];
            $res = $this->DB->where('s_id', $id)->update($data);	
            if ($res > 0) {
                $this->addLog(17, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(17, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            # 获取ID
            $id   = Request::instance()->param('pid');
            $res  = $this->DB->where('s_id', $id)->find();
            # 获取上级权限节点
            $name = $this->DB->where('s_id', $res['s_pid'])->value('s_name');
            $name = $name?:'顶级部门';
            $this->assign('id', $id);
            $this->assign('name', $name);
            $this->assign('info', $res);

            # 获取所有角色列表
            $role = Db::name('role')->select();
            $this->assign('role', $role);
			return $this->fetch();
		}
    }

    /**
     * 新增部门
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$pid    = Request::instance()->post('pid');
            $code   = Request::instance()->post('code');
			$name   = Request::instance()->post('name');
            $sort   = Request::instance()->post('sort');
            $role   = Request::instance()->post('role');
            $remark = Request::instance()->post('remark');

            if (empty($name)) {
                $this->addLog(16, '部门名称不能为空', 3, false);
                $this->json('01', '部门名称不能为空');
            }
            if (empty($role)) {
                $this->addLog(16, '请选择对应的角色', 3, false);
                $this->json('01', '请选择对应的角色');
            }
           
			$data = [
                's_pid'    => $pid,
                's_name'   => $name,
                's_code'   => $code,
                's_sort'   => $sort,
                'r_id'     => $role,
                's_remark' => $remark,	
                'add_time' => time(),	
            ];
            $res = $this->DB->insert($data);	
            if ($res > 0) {
                $this->addLog(16, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(16, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
			# 获取上级权限节点
            $pid  = Request::instance()->param('pid', 0);
            $this->assign('pid', $pid);
			if ($pid == 0) {
                $this->assign('name', '顶级部门');
            }else{
                $name = $this->DB->where('s_id', $pid)->value('s_name');
                $this->assign('name', $name);
            }
            
            # 获取所有角色列表
            $role = Db::name('role')->select();
            $this->assign('role', $role);
			return $this->fetch();
		}
    }

}
