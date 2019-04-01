<?php
// +----------------------------------------------------------------------
// | 日志编码管理
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

class Logtype extends Backend{

    /**
     * 日志编码列表 - 带添加界面
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public function index(){
        $_where = [];
        $_page  = [];
        $mode   = Request::instance()->get('mode');
        if (!empty($mode)) {
            $_where['lt_mode'] = ['=', $mode];
            $_page['mode']  = $mode;
        }

        $list = Db::name('log_type')->order('lt_id desc')->where($_where)->paginate(15, false, [
            'query' => $_page
        ]);
		$page = $list->render();

		$this->assign('list', $list);
		$this->assign('page', $page);
        $this->assign('mode', $mode);
		$this->assign('Log_Type', $this->Log_Type());
		return $this->fetch();
    }

    /**
     * 新增日志编码
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $pid  = Request::instance()->post('pid');
            $name = Request::instance()->post('name');

            $where = [];
            $where['lt_mode'] = ['=', $pid];
            $where['lt_name'] = ['=', $name];
			
			$info = Db::name('log_type')->where($where)->find();
			if ($info) {
                $this->addLog(1, '该解析名称已存在！', 3, false);
				$this->json('01', '该解析名称已存在！');
			}
			
            $data = [
                'lt_mode' => $pid,
                'lt_name' => $name,
            ];
			
            $res  = Db::name('log_type')->insert($data);
			
            if ($res > 0) {
                $this->addLog(1, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }
            $this->addLog(1, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }
    }
 
    /**
     * 删除日志编码
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public function del(){
        $id = Request::instance()->post('id');
        # 此处做下日志记录查询，查看这个编码是否已经被日志所关联
        $res = Db::name('log_type')->where('lt_id', $id)->delete();
        if ($res) {
            $this->addLog(3, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }

        $this->addLog(3, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }

    /**
     * 修改日志编码
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public function upd(){
        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('upd_id');
            $pid  = Request::instance()->post('pid');
            $name = Request::instance()->post('name');

            # 此处做下日志记录查询，查看这个编码是否已经被日志所关联

            $info = Db::name('log_type')->where('lt_id', $id)->find();
            if ($name != $info['lt_name']) {
                $where = [];
                $where['lt_mode'] = ['=', $pid];
                $where['lt_name'] = ['=', $name];
                $info = Db::name('log_type')->where($where)->find();
                if ($info) {
                    $this->addLog(2, '该解析名称已存在！', 3, false);
                    $this->json('01', '该解析名称已存在！');
                }
            }

            $data = [
                'lt_mode' => $pid,
                'lt_name' => $name,
            ];
			
            $res  = Db::name('log_type')->where('lt_id', $id)->update($data);
			
            if ($res > 0) {
                $this->addLog(2, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(2, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }
    }

    
}
