<?php
// +----------------------------------------------------------------------
// | 管理登录日志管理
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

class Loginlog extends Backend{

    /**
     * 登录日志列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
       $list = Db::name('manager_login_log')
               ->field('A.*, B.m_nice')
               ->alias('A')
               ->join('__MANAGER__ B',' A.m_id = B.m_id')
               ->order('A.l_time DESC')
               ->paginate(15);
        $this->assign('list', $list);
        $this->assign('page', $list->render());
        return $this->fetch();
    }

    /**
     * 登录日志删除
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
        $data= Request::instance()->param();
        $id  = $data['id'];
        # 检测是否批量删除
        if (is_array($id)) {
            $id = implode(',', $id);
        }

        $res = Db::name('manager_login_log')->where("l_id in($id)")->delete();
        if ($res) $this->addLog(28, '删除成功', 1);
        $this->error('删除失败');
    }

}
