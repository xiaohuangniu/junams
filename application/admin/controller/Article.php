<?php
// +----------------------------------------------------------------------
// | CMS模块 - 内容管理
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

class Article extends Backend{

    /**
     * 内容列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $id   = Request::instance()->param('pid');
        $res  = Db::name('item_content')->where('ic_id', $id)->field('im_id, ic_title')->find();
        $im_id = $res['im_id'];
        $model = Db::name('item_model')->where('im_id', $im_id)->find();
        $where = "im_id = '{$im_id}' && if_status = 1 && (if_type = 'text' || if_type = 'int' || if_type = 'image')";
        # 获得字段列表
        $field = Db::name('item_field')->field('if_type, if_name, if_title')->where($where)->order('if_sort DESC')->select();

        $table = $model['im_table'];
        $tabledata = strtoupper('__'.$table.'_data__');
        # 判断是否有附表
        if ($model['im_class'] == 1) {
            $list = Db::name($table)->alias('A')
                    ->join("{$tabledata} B", 'A.id = B.pid')
                    ->field('B.*, A.*')
                    ->where('A.columnpid', $id)
                    ->paginate(10, false, [
                        'query' => ['pid'=>$id]
                    ]);
        } else {
            $list = Db::name($table)->paginate(10, false, [
                        'query' => ['pid'=>$id]
                    ]);
        }

        $page = $list->render();

		$this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('field', $field);
        $this->assign('title', $res['ic_title']);
        $this->assign('im_id', $im_id);
        $this->assign('pid', $id);
        return $this->fetch();
    }

    /**
     * 删除内容
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id = Request::instance()->param('id');
        $im_id = Request::instance()->param('im_id');
        $model = Db::name('item_model')->where('im_id', $im_id)->find();
        
        $table = $model['im_table'];
        $tabledata = $table.'_data';
        $res1 = Db::name($table)->where('id', $id)->delete();
        $res2 = true;
        # 判断是否有附表
        if ($model['im_class'] == 1) {
            $res2 = Db::name($tabledata)->where('pid', $id)->delete();
        }

        if ($res1 && $res2) {
            $this->addLog(62, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }
        $this->addLog(62, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }

    /**
     * 切换内容状态
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function status() {
        $id = Request::instance()->param('pid');
        $status = Request::instance()->param('status');
        $im_id = Request::instance()->param('im_id');
        $model = Db::name('item_model')->where('im_id', $im_id)->find();
        
        $table = $model['im_table'];
        $res = Db::name($table)->where('id', $id)->update(['status'=>$status]);

        if ($res) {
            $this->addLog(63, '状态切换成功', 1, false);
            $this->json('00', '状态切换成功');
        }
        $this->addLog(63, '状态切换失败', 2, false);
        $this->json('01', '状态切换失败');
    }

    /**
     * 发布内容
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
        $pid   = Request::instance()->param('pid');
        $im_id = Request::instance()->param('im_id');
        $model = Db::name('item_model')->where('im_id', $im_id)->find();
        $where = "im_id = '{$im_id}' && if_status = 1";
        # 获得字段列表
        $field = Db::name('item_field')->where($where)->order('if_sort DESC')->select();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $param   = Request::instance()->param();
            $A = []; // 主表
            $B = []; // 附表
            $table     = $model['im_table'];
            $tabledata = $table.'_data';

            # 循环字段
            foreach ($field as $v) {
                # 判断必填字段不能为空
				if ($v['if_notnull'] == 1){
                    if ($param[$v['if_name']] === '') $this->json('01', $param[$v['if_title']] . '属于必填字段，不能为空！');
                }
                # 判断唯一字段的值,是否已经存在
				if ($v['if_only'] == 1) {
                    # 查询值是否已经存在
                    if ($v['if_is_data'] == 1) {
                        $where = [
                           'B'.$v['if_name'] => $param[$v['if_name']],
                           'A.columnpid' => $pid,
                        ];
                        $C = strtoupper('__'.$tabledata.'__');
                        $length = Db::name($table)->alias('A')
                                  ->join("$C B", 'A.id = B.pid')
                                  ->where($where)
                                  ->count();
                    } else {
                        $where = [
                           $v['if_name'] => $param[$v['if_name']],
                           'columnpid' => $pid,
                        ];
                        $length = Db::name($table)->where($where)->count();
                    }
					
                    if ($length >= 1) $this->json('01', $param[$v['if_title']] . '属于唯一字段，当前值已经存在！');
                }
                # 判断最小值
				if (!empty($v['if_min'])) {
                    $length = mb_strlen($param[$v['if_name']], 'utf8');
					if ($length < $v['if_min']) $this->json('01', $param[$v['if_title']] . '小于字段允许最小值！');
                }
                # 判断最大值
				if (!empty($v['if_max'])) {
                    $length = mb_strlen($param[$v['if_name']], 'utf8');
					if ($length > $v['if_max']) $this->json('01', $param[$v['if_title']] . '大于字段允许最大值！');
                }
                # 正则表达式
                if (!empty($v['if_regular'])) {
                    if (!preg_match($v['if_regular'], $param[$v['if_name']])) {
                        $this->json('01', $v['if_alert']);
                    }
                }
                # 附表还是主表
                if ($v['if_is_data'] == 1) {
                    $B[$v['if_name']] = $param[$v['if_name']];
                } else {
                    $A[$v['if_name']] = $param[$v['if_name']];
                }
            }
            # 有数据才能入库啊
            if (count($A) > 0) {
                $A['columnpid'] = $pid;
                $cid = Db::name($table)->insertGetId($A);
                if (!$cid) {
                    $this->addLog(65, '发布失败', 2, false);
                    $this->json('01', '发布失败');
                }
                # 附表有数据才能入库啊
                if (count($B) > 0) {
                    $B['pid'] = $cid;
                    $res = Db::name($tabledata)->insert($B);
                    if (!$res) {
                        $this->addLog(65, '发布失败', 2, false);
                        $this->json('01', '发布失败');
                    }
                }
            }

            $this->addLog(65, '发布成功', 1, false);
            $this->json('00', '发布成功');
        }else{
            $this->assign('field', $field);
            $this->assign('pid', $pid);
            $this->assign('im_id', $im_id);
            $this->assign('title', Db::name('item_content')->where('ic_id', $pid)->value('ic_title'));
			return $this->fetch();
        }
    }


    /**
     * 修改内容
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        $id   = Request::instance()->param('id');
        $pid   = Request::instance()->param('pid');
        $im_id = Request::instance()->param('im_id');
        $model = Db::name('item_model')->where('im_id', $im_id)->find();
        $where = "im_id = '{$im_id}' && if_status = 1";
        # 获得字段列表
        $field = Db::name('item_field')->where($where)->order('if_sort DESC')->select();
        $table     = $model['im_table'];
        $tabledata = $table.'_data';
        $C = strtoupper('__'.$tabledata.'__');
        # 查询出记录内容
        if ($model['im_class'] == 1) {
            $infoA = Db::name($table)->alias('A')
                    ->join("$C B", 'A.id = B.pid')
                    ->where('A.id', $id)
                    ->field('B.*, A.*')
                    ->find();
        } else {
            $infoA = Db::name($table)->where('id', $id)->find();
        }

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $param   = Request::instance()->param();
            $A = []; // 主表
            $B = []; // 附表

            # 循环字段
            foreach ($field as $v) {
                # 判断必填字段不能为空
				if ($v['if_notnull'] == 1){
                    if ($param[$v['if_name']] === '') $this->json('01', $param[$v['if_title']] . '属于必填字段，不能为空！');
                }
                # 判断唯一字段的值,是否已经存在
				if ($v['if_only'] == 1 && $param[$v['if_name']] != $infoA[$v['if_name']]) {
                    # 查询值是否已经存在
                    if ($v['if_is_data'] == 1) {
                        $where = [
                           'B'.$v['if_name'] => $param[$v['if_name']],
                           'A.columnpid' => $pid,
                        ];
                        $length = Db::name($table)->alias('A')
                                  ->join("$C B", 'A.id = B.pid')
                                  ->where($where)
                                  ->count();
                    } else {
                        $where = [
                           $v['if_name'] => $param[$v['if_name']],
                           'columnpid' => $pid,
                        ];
                        $length = Db::name($table)->where($where)->count();
                    }
					
                    if ($length >= 1) $this->json('01', $param[$v['if_title']] . '属于唯一字段，当前值已经存在！');
                }
                # 判断最小值
				if (!empty($v['if_min'])) {
                    $length = mb_strlen($param[$v['if_name']], 'utf8');
					if ($length < $v['if_min']) $this->json('01', $param[$v['if_title']] . '小于字段允许最小值！');
                }
                # 判断最大值
				if (!empty($v['if_max'])) {
                    $length = mb_strlen($param[$v['if_name']], 'utf8');
					if ($length > $v['if_max']) $this->json('01', $param[$v['if_title']] . '大于字段允许最大值！');
                }
                # 正则表达式
                if (!empty($v['if_regular'])) {
                    if (!preg_match($v['if_regular'], $param[$v['if_name']])) {
                        $this->json('01', $v['if_alert']);
                    }
                }
                # 附表还是主表
                if ($v['if_is_data'] == 1) {
                    $B[$v['if_name']] = $param[$v['if_name']];
                } else {
                    $A[$v['if_name']] = $param[$v['if_name']];
                }
            }
            # 有数据才能入库啊
            if (count($A) > 0) {
                $res = Db::name($table)->where('id', $id)->update($A);
                if ($res === false) {
                    $this->addLog(66, '修改失败', 2, false);
                    $this->json('01', '修改失败');
                }
                # 附表有数据才能入库啊
                if (count($B) > 0) {
                    $res = Db::name($tabledata)->where('pid', $id)->update($B);
                    if ($res === false) {
                        $this->addLog(66, '修改失败', 2, false);
                        $this->json('01', '修改失败');
                    }
                }
            }

            $this->addLog(66, '修改成功', 1, false);
            $this->json('00', '修改成功');
        }else{
            $this->assign('field', $field);
            $this->assign('pid', $pid);
            $this->assign('im_id', $im_id);
            $this->assign('title', Db::name('item_content')->where('ic_id', $pid)->value('ic_title'));
            $this->assign('info', $infoA);
			return $this->fetch();
        }
    }
}