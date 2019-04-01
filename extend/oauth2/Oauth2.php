<?php
// +----------------------------------------------------------------------
// | Oauth2 - 第三方登录 API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2;
use think\Db;
use think\Request;

class Oauth2 {
    
    /**
     * 调用跳转到对应的授权地址
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.9 + 2018.12.03
     * @deprecated 暂不弃用
     * @global 无
     * @param string $type 授权类型
     * @return json
    */
    public static function run($type=''){  
        $config = \oauth2\Oauth\Basics::config();
        
        switch ($type) {
            case '神牛教': \oauth2\Oauth\Shenniu::run($config); break;
            case '百度': \oauth2\Oauth\Baidu::run($config); break;
            case '微博': \oauth2\Oauth\Weibo::run($config); break;
            case 'github': \oauth2\Oauth\Github::run($config); break;
            default: return false;
        }
    }

    /**
     * 统一回复参数监听
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.9 + 2018.12.03
     * @deprecated 暂不弃用
     * @global 无
     * @return array
    */
    public static function monitor() {
        $param = Request::instance()->param();
        
        if (empty($param['code']) || empty($param['state']))  return false;

        switch ($param['state']) {
            case '神牛教': return \oauth2\Oauth\Shenniu::code($param['code']); break;
            case '百度': return \oauth2\Oauth\Baidu::code($param['code']); break;
            case '微博': return \oauth2\Oauth\Weibo::code($param['code']); break;
            case 'github': return \oauth2\Oauth\Github::code($param['code']); break;
            default: return false;
        }
    }
}