<?php
// +----------------------------------------------------------------------
// | 第三方登录 - Github
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2\Oauth;
use oauth2\Oauth\Basics;

class Github extends Basics{
    /**
     * 跳转授权
    */
    private static $_url_1 = 'https://github.com/login/oauth/authorize?client_id=%SS%&redirect_uri=%SS%&state=%SS%';
    /**
     * 获取CODE
    */
    private static $_url_2 = 'https://github.com/login/oauth/access_token?client_id=%SS%&client_secret=%SS%&code=%SS%&redirect_uri=%SS%';
    /**
     * 获取用户信息
    */
    private static $_url_3 = 'https://api.github.com/user?access_token=%SS%';

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
        $redirect_uri  = self::str_url(self::$_url_1, [$config['oauth_git_client_id'], urlencode($config['oauth_url']), 'github']);
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

        # 发送GET，获得Access_Token
        $res  = file_get_contents(self::str_url(self::$_url_2, [$config['oauth_git_client_id'], $config['oauth_git_client_secret'], $code, $config['oauth_url']]));
        parse_str($res, $data);

        # 拿不到token
        if (empty($data['access_token'])) return false;

        # 发送CURL，获得用户信息
        $res  = self::https_request(self::str_url(self::$_url_3, [$data['access_token']]));
        $data = json_decode($res, true);
        
        # 拿不到会员信息
        if (empty($data['login'])) return false;

        return [
            'user_id'  => $data['id'],
            'name'     => $data['login'],
            'nick'     => $data['login'],
            'sex'      => '0',
            'portrait' => $data['avatar_url'],
            'type'     => 'git',
        ];
    }
}