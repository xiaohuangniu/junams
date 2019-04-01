<?php
// +----------------------------------------------------------------------
// | 微信域名屏蔽检测
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Iswx {

    /**
     * 检测域名是否被微信屏蔽
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return string $key 域名
     * @return void
    */
    public static function run($key) {
        $url = 'http://wx.03426.com/api.php?token='.self::get_token().'&url='.$key.'&type=1&_='.time();
        $res = self::https_request($url);
        $array = json_decode($res, true);

        if (strrpos($array['msg'], '封') !== false || strrpos($array['msg'], '禁') !== false ) {
            return false;
        }
        return true;
    }

    /**
     * 生成一个国内的随机IP地址
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return string IP段
    */
    private static function get_ip() {
        $ip_long = [
            ['607649792', '608174079'], //36.56.0.0-36.63.255.255
            ['1038614528', '1039007743'], //61.232.0.0-61.237.255.255
            ['1783627776', '1784676351'], //106.80.0.0-106.95.255.255
            ['2035023872', '2035154943'], //121.76.0.0-121.77.255.255
            ['2078801920', '2079064063'], //123.232.0.0-123.235.255.255
            ['-1950089216', '-1948778497'], //139.196.0.0-139.215.255.255
            ['-1425539072', '-1425014785'], //171.8.0.0-171.15.255.255
            ['-1236271104', '-1235419137'], //182.80.0.0-182.92.255.255
            ['-770113536', '-768606209'], //210.25.0.0-210.47.255.255
            ['-569376768', '-564133889'], //222.16.0.0-222.95.255.255
        ];
        $rand_key = mt_rand(0, 9);
        return long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
    }

    /**
     * 获得网站中的Token值
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return string
    */
    private static function get_token() {
        $url = 'wx.03426.com';
        $content = self::https_request($url);
        $array   = explode('token:',$content);
        if (count($array) == 1) {
            $array   = explode('token :',$content);
        }
        $array   = explode(',', $array[1]);
        return str_replace(['"', "'"],'', $array[0]);
    }

    # 发起特殊的CURL请求
    private static function https_request($url, $data = null){
        $ip = self::get_ip();
        $headers['CLIENT-IP']       = $ip; 
        $headers['X-FORWARDED-FOR'] = $ip; 
        $headerArr = [];
        foreach ($headers as $k=>$v) {
            $headerArr[] = $k .':'. $v; 
        }

        $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_SSLVERSION, 3);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);    
        # 模拟来源 
        curl_setopt($curl, CURLOPT_REFERER, 'http://wx.03426.com');
        # 伪造IP 
        curl_setopt($curl, CURLOPT_HTTPHEADER , $headerArr); 
         
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}