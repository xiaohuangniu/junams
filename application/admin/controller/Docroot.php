<?php
// +----------------------------------------------------------------------
// | 文档管理
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
use org\Fileroot;

class Docroot extends Backend{
    
    /**
     * JunCMS 二次开发文档
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function juncms(){ return $this->fetch(); }

    /**
     * 后台控制器文档
     * @todo 使用OOP反射类实现，每个控制器对应成员函数的注释头都需要绝对规范，否则无效
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function admin() {
        $obj = new Fileroot();
        $admin  = $obj->run(APP_PATH.'admin'.DS.'controller'.DS);
        $common = $obj->run(APP_PATH.'common'.DS.'controller'.DS);
 
        $this->assign('admin_list', $admin);
        $this->assign('common_list', $common);
        return $this->fetch();
    }

    /**
     * 读取后台控制器文档函数列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function showlist() {
        $url = Request::instance()->param('url');
        $obj = new Fileroot();
        $this->assign('function_list', $obj->getList($url));
        $this->assign('url', $url);
        $this->assign('name', Request::instance()->param('name'));
        return $this->fetch();
    }

    /**
     * 函数描述
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details() {
        $url   = APP_PATH.str_replace('|', DS, Request::instance()->param('url'));
        $class = Request::instance()->param('class');
        $obj   = new Fileroot();
        $info  = $obj->getContent($url, $class);
        $this->assign('url', $url);
        $this->assign('name', Request::instance()->param('name'));
        $this->assign('info', $info);
        return $this->fetch(); 
    }
    
}
