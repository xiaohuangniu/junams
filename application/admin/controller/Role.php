<?php
// +----------------------------------------------------------------------
// | 角色管理模块
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

class Role extends Backend{
    protected $ROLE; // 角色表
    protected $MENU; // 权限表

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
        $this->ROLE = Db::name('role');
        $this->MENU = Db::name('menu');
    }

    /**
     * 角色列表
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $list = $this->ROLE->paginate(15);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }    

    /**
     * 新增角色
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
            $name   = Request::instance()->post('name');
            $pid    = json_decode(Request::instance()->post('id'), true);
            $status = Request::instance()->post('status',2);
            $remark = Request::instance()->post('remark');
            if (!$pid) {
                $this->addLog(19, '请先选择对应的权限', 3, false);
                $this->json('01', '请先选择对应的权限');
            }

            $res = $this->ROLE->where('r_name', $name)->value('r_id');
            if ($res) {
                $this->addLog(19, '角色名称已存在！', 3, false);
                $this->json('01', '角色名称已存在！');
            }
            $menu   = implode(',', $pid);
            
            $data = [
                'r_name'   => $name,
                'r_status' => $status,
                'r_remark' => $remark,
                'r_menu_list' => $menu,
            ];

            $res  = $this->ROLE->insert($data);
            if ($res !== false) {
                $this->addLog(19, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(19, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
            $list = $this->MENU->field('m_id as checkboxValue, m_name as name,  m_pid as pid')->where('m_type = 1 AND m_status = 1')->select();

            $this->assign('json', json_encode( roleAdd($list)) );
            return $this->fetch();
        }
    }

    /**
     * 修改角色
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        $id   = Request::instance()->param('pid');
        $info = Db::name('role')->where('r_id', $id)->find();

        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name   = Request::instance()->post('name');
            $pid    = json_decode(Request::instance()->post('id'), true);
            $status = Request::instance()->post('status',2);
            $remark = Request::instance()->post('remark');
            if (!$pid) {
                $this->addLog(20, '请先选择对应的权限', 3, false);
                $this->json('01', '请先选择对应的权限');
            }
            if ($name != $info['r_name']) {
                $res = $this->ROLE->where('r_name', $name)->value('r_id');
                if ($res) {
                    $this->addLog(20, '角色名称已存在！', 3, false);
                    $this->json('01', '角色名称已存在！');
                }
            }
            $menu   = implode(',', $pid);

            $data = [
                'r_name'   => $name,
                'r_status' => $status,
                'r_remark' => $remark,
                'r_menu_list' => $menu,
            ];

            $res  = $this->ROLE->where('r_id', $id)->update($data);
            if ($res !== false) {
                $this->addLog(20, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(20, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $list = $this->MENU->field('m_id as checkboxValue, m_name as name,  m_pid as pid')->where('m_type = 1 AND m_status = 1')->select();
            $this->assign('json', json_encode( roleUpd($list, $info['r_menu_list'])) );
            $this->assign('info', $info);
            return $this->fetch();
        }
    }

    /**
     * 删除角色
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
        $id  = Request::instance()->param('id');
        # 先删除
        $res = Db::name('role')->where("r_id = '{$id}'")->delete();
        if ($res) {
            $this->addLog(21, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }

        $this->addLog(21, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }
    
}
