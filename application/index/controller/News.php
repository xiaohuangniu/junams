<?php
// +----------------------------------------------------------------------
// | IT资讯 -  - JunAMS内容管理系统
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\index\controller;

use app\common\controller\Main;
use think\Db;

class News extends Main {



    /**
     * 主页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        $id  = \think\Request::instance()->param('id');
        $this->assign('id', $id);
        return $this->fetch();
    }

    /**
     * 列表页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function showlist() {
        return $this->fetch();
    }

    /**
     * 详情页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details() {
        $id  = \think\Request::instance()->param('id');
        $pid = \think\Request::instance()->param('pid');
        $table = Db::name('item_content')->alias('A')
                 ->join('__ITEM_MODEL__ B', 'A.im_id = B.im_id')
                 ->field('B.im_table, B.im_class')
                 ->where('A.ic_id', $pid)
                 ->find();

        # 查询详情
        if ($table['im_class'] == 1) {
            $info = Db::name($table['im_table'])->alias('A')
                    ->join('__'.strtoupper($table['im_table'].'_data').'__ B', 'A.id = B.pid')
                    ->field('B.*, A.*')
                    ->where('A.id', $id)
                    ->find();
        } else {
            $info = Db::name($table['im_table'])
                    ->where('id', $id)
                    ->find();
        }

        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 营销页
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function marketing() {
        return $this->fetch();
    }
}         