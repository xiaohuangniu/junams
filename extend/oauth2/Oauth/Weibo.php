<?php
// +----------------------------------------------------------------------
// | 第三方登录 - 微博
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2\Oauth;
use oauth2\Oauth\Basics;

class Weibo extends Basics{
    /**
     * 跳转授权
    */
    private static $_url_1 = 'https://api.weibo.com/oauth2/authorize?client_id=%SS%&redirect_uri=%SS%&response_type=code&state=%SS%';
    /**
     * 获取CODE
    */
    private static $_url_2 = 'https://api.weibo.com/oauth2/access_token?client_id=%SS%&client_secret=%SS%&grant_type=authorization_code&redirect_uri=%SS%&code=%SS%';
    /**
     * 获取用户信息-userid
    */
    private static $_url_3 = 'https://api.weibo.com/oauth2/get_token_info?access_token=%SS%';
    /**
     * 获取用户信息-账号
    */
    private static $_url_4 = 'https://api.weibo.com/2/users/show.json?access_token=%SS%&uid=%SS%';

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
        $redirect_uri  = self::str_url(self::$_url_1, [$config['oauth_wb_client_id'], urlencode($config['oauth_url']), '微博']);
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
        $res  = self::https_request(self::str_url(self::$_url_2, [$config['oauth_wb_client_id'], $config['oauth_wb_client_secret'], $config['oauth_url'], $code]));
        $data = json_decode($res, true);

        # 拿不到token
        if (empty($data['access_token'])) return false;

        # 发送CURL，获得用户ID
        $res  = self::https_request(self::str_url(self::$_url_3, [$data['access_token']]));
        $data = json_decode($res, true);
        
        # 拿不到会员id
        if (empty($data['uid'])) return false;

        # 发送CURL，获取用户信息
        $res  = self::https_request(self::str_url(self::$_url_4, [$data['access_token'], $data['uid']]));
        $data = json_decode($res, true);

        # 拿不到会员信息
        if (empty($data['name'])) return false;

        $sex = 0;
        if ($data['gender'] == 'm') { $sex = 1; } 
        else if ($data['gender'] == 'f') { $sex = 2; } 

        return [
            'user_id'  => $data['id'],
            'name'     => $data['name'],
            'nick'     => $data['screen_name'],
            'sex'      => $sex,
            'portrait' => $data['profile_image_url'],
            'type'     => 'wb',
        ];
    }
}