<?php
// +----------------------------------------------------------------------
// | CMS模块 - 栏目管理
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

class Column extends Backend{

    /**
     * 查询栏目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @param string $item 项目ID
     * @param string $pid 不查询的ID
     * @return void
    */
    private function get_column($item, $pid='') {
        $where = [
            'i_id'=>$item,
            'ic_id' => ['<>', $pid],
        ];
        $list = Db::name('item_column')->where($where)->order('ic_path ASC')->select();
        foreach($list as $k => $v){
			$list[$k]['ic_title'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['ic_level']).$list[$k]['ic_title'];
        }
        return $list;
    }

    /**
     * 栏目列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $item = Db::name('item')->where('i_status', 1)->value('i_id');
        
        # 获取当前项目信息
        $this->assign('item', $item);
		$this->assign('list', $this->get_column($item));
        return $this->fetch();
    }

    /**
     * 添加新栏目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
        $item = Db::name('item')->where('i_status', 1)->value('i_id');

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $title = Request::instance()->post('title');
            $pid   = Request::instance()->post('pid');
            $href  = Request::instance()->post('href');
            $icon  = Request::instance()->post('icon');
            $high  = Request::instance()->post('high');

            # 判断模型名和表名是否为空
			if (empty($title)) {
                $this->json('01', '栏目名称不能为空!');
            }
            # 获取当前项目信息
            if (!$item) {
                $this->json('01', '请前往项目管理模块，选中一个项目！');
            }

            //path的值分为两种情况
            //全路径：父级全路径与本身id的连接信息
            //① 当前权限是顶级权限，path=$new_id
            //② 当前权限是非顶级权限，path=父级全路径+$new_id
            $cid = uniqid();
            if ($pid == 0) {
                $path = $cid;
                $pid  = 0;
            }else{
                $infoA = DB::name('item_column')->where('ic_id', $pid)->find();
                $path = $infoA['ic_path']."/".$cid;
            }
            //把全路径变为数组，计算数组的个数和减去-1，就是level的信息
            $level = count(explode('/',$path))-1;

            # 入库做记录
            $data = [
                'ic_id'    => $cid,
                'i_id'     => $item,
                'ic_pid'   => $pid,
                'ic_title' => $title,
                'ic_href'  => $href,
                'ic_icon'  => $icon,
                'ic_high'  => $high,
                'ic_path'  => $path,
                'ic_level' => $level,
            ];
           
            $res = Db::name('item_column')->insert($data);
            if ($res) {
                $this->addLog(67, '添加成功', 1, false);
                $this->json('00', '添加成功');
            }

            $this->addLog(67, '添加失败', 2, false);
            $this->json('01', '添加失败');
        }else{
            $this->assign('item', $item);
            $this->assign('list', $this->get_column($item));
			return $this->fetch();
		}
    }


    /**
     * 修改栏目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('id');
        $item = Db::name('item')->where('i_status', 1)->value('i_id');
        $info = Db::name('item_column')->where('ic_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $title = Request::instance()->post('title');
            $pid   = Request::instance()->post('pid');
            $href  = Request::instance()->post('href');
            $icon  = Request::instance()->post('icon');
            $high  = Request::instance()->post('high');

            # 判断模型名和表名是否为空
			if (empty($title)) {
                $this->json('01', '栏目名称不能为空!');
            }
            # 获取当前项目信息
            if (!$item) {
                $this->json('01', '请前往项目管理模块，选中一个项目！');
            }

            $res  = Db::name('item_column')->where('ic_pid', $id)->value('ic_id');
            if ($res) {
                $this->addLog(69, '不允许在中间移动栏目！', 2, false);
                $this->json('01', '不允许在中间移动栏目！');
            }

            //path的值分为两种情况
            //全路径：父级全路径与本身id的连接信息
            //① 当前权限是顶级权限，path=$new_id
            //② 当前权限是非顶级权限，path=父级全路径+$new_id
            $cid = uniqid();
            if ($pid == 0) {
                $path = $cid;
                $pid  = 0;
            }else{
                $infoA = DB::name('item_column')->where('ic_id', $pid)->find();
                $path = $infoA['ic_path']."/".$cid;
            }
            //把全路径变为数组，计算数组的个数和减去-1，就是level的信息
            $level = count(explode('/',$path))-1;

            # 入库做记录
            $data = [
                'ic_id'    => $cid,
                'i_id'     => $item,
                'ic_pid'   => $pid,
                'ic_title' => $title,
                'ic_href'  => $href,
                'ic_icon'  => $icon,
                'ic_high'  => $high,
                'ic_path'  => $path,
                'ic_level' => $level,
            ];
           
            $res = Db::name('item_column')->where('ic_id', $id)->update($data);
            if ($res) {
                $this->addLog(69, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(69, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $this->assign('item', $item);
            $this->assign('list', $this->get_column($item, $id));
            $this->assign('info', $info);
			return $this->fetch();
		}
    }

    /**
     * 删除栏目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id   = Request::instance()->param('id');
        $DB   = Db::name('item_column');
        $res  = $DB->where('ic_pid', $id)->value('ic_id');
        if ($res) {
            $this->addLog(68, '该栏目下还存在子栏目，请先删除子栏目！', 2, false);
            $this->json('01', '该栏目下还存在子栏目，请先删除子栏目！');
        }

        # 删除
        $res  = $DB->where('ic_id', $id)->delete();
        if (!$res) {
            $this->addLog(68, '删除失败！', 2, false);
            $this->json('01', '删除失败！');
        }
        $this->addLog(68, '删除成功！', 1, false);
        $this->json('00', '删除成功！');
    }
}