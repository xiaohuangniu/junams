<?php
// +----------------------------------------------------------------------
// | 第三方登录 - 神牛教
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2\Oauth;
use oauth2\Oauth\Basics;

class Shenniu extends Basics{
    /**
     * 跳转授权
    */
    private static $_url_1 = 'https://xiuxian.junphp.com/oauth2?appid=%SS%&redirect_uri=%SS%&state=%SS%';
    /**
     * 获取CODE
    */
    private static $_url_2 = 'https://xiuxian.junphp.com/oauth2/access_token?appid=%SS%&code=%SS%';
    /**
     * 获取用户信息
    */
    private static $_url_3 = 'https://xiuxian.junphp.com/oauth2/get_user?appid=%SS%&access_token=%SS%';

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
        $redirect_uri  = self::str_url(self::$_url_1, [$config['oauth_sn_appid'], $config['oauth_url'], '神牛教']);
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
        $res  = self::https_request(self::str_url(self::$_url_2, [$config['oauth_sn_appid'], $code]));
        $data = json_decode($res, true);

        # 拿不到token
        if (empty($data['access_token'])) return false;

        # 发送CURL，获得用户的信息
        $res  = self::https_request(self::str_url(self::$_url_3, [$config['oauth_sn_appid'], $data['access_token']]));
        $data = json_decode($res, true);
        
        # 拿不到会员信息
        if (empty($data['nick'])) return false;

        return [
            'user_id'  => $data['user_id'],
            'name'     => $data['name'],
            'nick'     => $data['nick'],
            'sex'      => '0',
            'portrait' => '',
            'type'     => 'snj',
        ];
    }
}