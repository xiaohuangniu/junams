<?php
// +----------------------------------------------------------------------
// | 版本管理模块
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

class Edition extends Backend{
 
    /**
     * 版本列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
		$list = Db::name('edition')->order('e_id desc')->paginate(15);
		$page = $list->render();

		$this->assign('list', $list);
		$this->assign('page', $page);

		return $this->fetch();
    }

    /**
     * 新增版本
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $edition = Request::instance()->post('edition');
            $time    = Request::instance()->post('time');
            $status  = Request::instance()->post('status');
            $content = Request::instance()->post('content');
			
			$info = Db::name('edition')->where('e_edition', $edition)->find();
			if ($info) {
                $this->addLog(4, '版本号已存在！', 3, false);
				$this->json('01', '版本号已存在！');
			}
			
            $data = [
                'e_edition'  => $edition,
                'e_time'     => $time,
                'e_status'   => $status,
                'e_content'  => $content,
				'e_add_time' => time(),
				'admin_id'   => $this->admin['m_id'],
            ];
			
            $res  = Db::name('edition')->insert($data);
			
            if ($res > 0) {
                $this->addLog(4, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(4, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
            $edition = Db::name('edition')->order('e_id desc')->value('e_edition');
            $this->assign('edition', $edition);
			return $this->fetch();
		}
    }

    /**
     * 删除版本
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
        $id = Request::instance()->post('id');
        # 此处做下权限菜单检测，查看这个版本是否已经发布了权限菜单

        $res = Db::name('edition')->where('e_id','=',$id)->delete();
        if ($res) {
            $this->addLog(6, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }

        $this->addLog(6, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }

    /**
     * 修改版本
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        $id   = Request::instance()->param('pid');
        $info = Db::name('edition')->where('e_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $edition = Request::instance()->post('edition');
            $time    = Request::instance()->post('time');
            $status  = Request::instance()->post('status');
            $content = Request::instance()->post('content');
			
            if ($edition != $info['e_edition']) {
                echo $edition .$info['e_edition'];
                $info = Db::name('edition')->where("e_edition", $edition)->find();
                if ($info) {
                    $this->addLog(5, '版本号已存在！', 3, false);
                    $this->json('01', '版本号已存在！');
                }
            }
			
            $data = [
                'e_edition'  => $edition,
                'e_time'     => $time,
                'e_status'   => $status,
                'e_content'  => $content,
				'admin_id'   => $this->admin['m_id'],
            ];
			
            $res  = Db::name('edition')->where('e_id', $id)->update($data);
			
            if ($res > 0) {
                $this->addLog(5, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(5, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $edition = Db::name('edition')->order('e_id desc')->value('e_edition');
            $this->assign('edition', $edition);
            $this->assign('info', $info);
			return $this->fetch();
		}
    }
}
