<?php
// +----------------------------------------------------------------------
// | 岗位管理
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

class Job extends Backend{
    protected $DB; // 岗位表

    /**
     * 初始化定义数据模型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
		parent::_initialize();  
        $this->DB = Db::name('job');
    }

    /**
     * 岗位列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        # 获取所有部门列表
        $list = $this->DB->field('j_id as id, j_name as name,  j_pid as pid')->order('j_id ASC')->select();
        $this->assign('json', menuFor($list) );
        return $this->fetch();
    }

    /**
     * 删除岗位
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('id');
            $info = $this->DB->where('j_pid', $id)->find();
            if ($info) {
                $this->addLog(9, '还存在下级岗位，不允许删除', 3, false);
                $this->json('01', '还存在下级岗位，不允许删除');
            }

            # 这里判断一下对应的管理员是否已经关联了这个岗位

            $res = $this->DB->where('j_id', $id)->delete();
            if ($res) {
                $this->addLog(9, '删除成功', 1, false);
                $this->json('00', '删除成功');
            }

            $this->addLog(9, '删除失败', 2, false);
            $this->json('01', '删除失败');
        }
    }

    /**
     * 修改
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$id     = Request::instance()->post('id');
			$pid    = Request::instance()->post('pid');
			$name   = Request::instance()->post('name');
            $role   = json_decode(Request::instance()->post('role'), true);

            # 简单过滤数据
            if (empty($name)) {
                $this->addLog(8, '岗位名称不能为空', 3, false);
                $this->json('01', '岗位名称不能为空');
            }
            if (empty($role)) {
                $this->addLog(8, '请选择对应的角色', 3, false);
                $this->json('01', '请选择对应的角色');
            }
           
			$data = [
                'j_pid'    => $pid,
                'j_name'   => $name,
                'r_id'     => implode(',', $role),
            ];
            $res = $this->DB->where('j_id', $id)->update($data);	
            if ($res > 0) {
                $this->addLog(8, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(8, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            # 获取ID
            $id   = Request::instance()->param('pid');
            $res  = $this->DB->where('j_id', $id)->find();
            # 获取上级权限节点
            $name = $this->DB->where('j_id', $res['j_pid'])->value('j_name');
            $name = $name?:'顶级岗位';
            $this->assign('id', $id);
            $this->assign('name', $name);
            $this->assign('info', $res);
            $this->assign('array', explode(',', $res['r_id']));

            # 获取所有角色列表
            $role = Db::name('role')->where('r_status', 1)->select();
            $this->assign('role', $role);
			return $this->fetch();
		}
    }

    /**
     * 新增岗位
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$pid    = Request::instance()->post('pid');
			$name   = Request::instance()->post('name');
            $role   = json_decode(Request::instance()->post('role'), true);

            if (empty($name)) {
                $this->addLog(7, '岗位名称不能为空', 3, false);
                $this->json('01', '岗位名称不能为空');
            }
            if (empty($role)) {
                $this->addLog(7, '请选择对应的角色', 3, false);
                $this->json('01', '请选择对应的角色');
            }
           
			$data = [
                'j_pid'    => $pid,
                'j_name'   => $name,
                'r_id'     => implode(',', $role),	
                'add_time' => time(),	
            ];
            $res = $this->DB->insert($data);	
            if ($res > 0) {
                $this->addLog(7, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(7, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
			# 获取上级权限节点
            $pid  = Request::instance()->param('pid', 0);
            $this->assign('pid', $pid);
			if ($pid == 0) {
                $this->assign('name', '顶级岗位');
            }else{
                $name = $this->DB->where('j_id', $pid)->value('j_name');
                $this->assign('name', $name);
            }
            
            # 获取所有角色列表
            $role = Db::name('role')->where('r_status', 1)->select();
            $this->assign('role', $role);
			return $this->fetch();
		}
    }

}
