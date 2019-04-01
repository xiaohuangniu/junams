<?php
// +----------------------------------------------------------------------
// | JunAMS
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\Controller;

class Index extends Controller {

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
        return $this->fetch();
    }

}
