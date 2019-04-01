<?php
// +----------------------------------------------------------------------
// | 微信管理模块
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

class Weixin extends Backend{

    /**
     * 自动回复内容列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function auto_index(){
        $list = Db::name('weixin_reply')->paginate(20);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }    

    /**
     * 新增回复内容
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function auto_add(){
        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name    = Request::instance()->post('name');
            $content = Request::instance()->post('content');
            $status  = Request::instance()->post('status',0);

            $data = [
                'name'    => $name,
                'content' => $content,
                'status'  => $status,
                'time'    => time(),
            ];

            $res  = Db::name('weixin_reply')->insert($data);
            if ($res > 0) {
                $this->addLog(42, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(42, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }
        return $this->fetch();
    }

    /**
     * 修改回复内容
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function auto_upd(){
        $id = Request::instance()->param('id');
        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name    = Request::instance()->post('name');
            $content = Request::instance()->post('content');
            $status  = Request::instance()->post('status', 0);

            $data = [
                'name'    => $name,
                'content' => $content,
                'status'  => $status,
            ];

            $res  = Db::name('weixin_reply')->where('id', $id)->data($data)->update();
            if ($res !== false) {
                $this->addLog(43, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(43, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }
        $info = Db::name('weixin_reply')->where('id', $id)->find();
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 删除自动回复内容
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function auto_del(){
        $id  = Request::instance()->param('id');
        # 先删除
        $res = Db::name('weixin_reply')->where('id',$id)->delete();
        if ($res) {
            $this->addLog(44, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }

        $this->addLog(44, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }
    
}
