<?php
// +----------------------------------------------------------------------
// | 第三方登录 - 百度
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2\Oauth;
use oauth2\Oauth\Basics;

class Baidu extends Basics{
    /**
     * 跳转授权
    */
    private static $_url_1 = 'https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=%SS%&redirect_uri=%SS%&display=popup&state=%SS%';
    /**
     * 获取CODE
    */
    private static $_url_2 = 'https://openapi.baidu.com/oauth/2.0/token?grant_type=authorization_code&code=%SS%&client_id=%SS%&client_secret=%SS%&redirect_uri=%SS%';
    /**
     * 获取用户信息
    */
    private static $_url_3 = 'https://openapi.baidu.com/rest/2.0/passport/users/getInfo?access_token=%SS%';

    /**
     * 跳转
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.9 + 2018.12.03
     * @deprecated 暂不弃用
     * @global 无
     * @param array $config 接口所需的配置参数
     * @return void
    */
    public static function run($config) {
        $redirect_uri  = self::str_url(self::$_url_1, [$config['oauth_bd_client_id'], $config['oauth_url'], '百度']);
        header("location:{$redirect_uri}");exit;
    }
    
    /**
     * 接收code参数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.9 + 2018.12.03
     * @deprecated 暂不弃用
     * @global 无
     * @param string $code code码
     * @return void
    */
    public static function code($code) {
        $config = self::config();

        # 发送CURL，获得Access_Token
        $res  = self::https_request(self::str_url(self::$_url_2, [$code, $config['oauth_bd_client_id'], $config['oauth_bd_client_secret'], $config['oauth_url']]));
        $data = json_decode($res, true);

        # 拿不到token
        if (empty($data['access_token'])) return false;

        # 发送CURL，获得用户的信息
        $res  = self::https_request(self::str_url(self::$_url_3, [$data['access_token']]));
        $data = json_decode($res, true);
        
        # 拿不到会员信息
        if (empty($data['username'])) return false;

        return [
            'user_id'  => $data['userid'],
            'name'     => $data['name'],
            'nick'     => $data['username'],
            'sex'      => $data['sex'],
            'portrait' => $data['portrait'],
            'type'     => 'bd',
        ];
    }
}