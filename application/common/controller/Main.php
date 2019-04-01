<?php
// +----------------------------------------------------------------------
// | 前端控制器基类
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace app\common\controller;

use think\Controller;

class Main extends Controller {

    /**
     * 登录状态记录
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不启用
     * @global 无
     * @return void
    */
    public function _initialize() {
        parent::_initialize();
        header('Content-Type:text/html;charset:utf-8');
    }
}
