<?php
// +----------------------------------------------------------------------
// | 根据IP获取省市区
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Ipcity {
   
    /**
     * 检测域名是否被微信屏蔽
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return string $ip IP地址
     * @return bool|array
    */
    public static function run($ip) {
        if ($ip == '127.0.0.1' || $ip == '0.0.0.0') {
            return [
                'province'=>'本地',
                'city'=>'本地',
                'area'=>'本地',
                'flow'=>'本地'
            ];
        }
        $url = 'http://www.ip138.com/ips138.asp?ip='.$ip;
        $res = self::https_request($url);
        if (!$res) return false;

        $array = explode('<td align="center"><ul class="ul1">', $res);
        $array = explode('</li></ul></td>', $array[1]);
        $str   = str_replace('<li>', '', $array[0]);
        $array = explode('</li>', $str);
        # 省市 服务商
        $A = $array[0];
        # 可能存在区
        $B = $array[2];

        # 获得省市+服务商
        $array = explode('：', $A);
        $array = explode('省', $array[1]);
        $return['province'] = $array[0];
        $array = explode('市', $array[1]);
        $return['city'] = $array[0];
        $return['area'] = '';
        $return['flow'] = str_replace(' ','',$array[1]);

        # 检测可能存在区
        if (stripos($B, ')') !== false) {
            $array = explode('(', $B);
            $return['area'] = rtrim($array[1], ')');
        }
        return $return;
    }

    # 
    /**
     * 发起特殊的CURL请求
     * @todo 无
     * @author 小黄牛
     * @version v1.1.6 + 2019.03.28
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 请求地址
     * @return void
    */
    private static function https_request($url){
        $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Accept-Language:zh-CN,zh;q=0.9,en;q=0.8',
            'Cache-Control:max-age=0',
            'Connection:keep-alive',
            'Host:www.ip138.com',
            'Upgrade-Insecure-Requests:1',
            'User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
        ]);      
        $response = curl_exec($curl);
        curl_close($curl);
        return iconv("GB2312","UTF-8",$response);
    }
}