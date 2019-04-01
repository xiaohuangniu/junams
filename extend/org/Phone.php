<?php
// +----------------------------------------------------------------------
// | 手机归属地查询API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Phone{

    /**
     * 执行查询
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param int $phone 手机号
     * @return array 查询结果
    */
    public static function run($phone=''){
        if (empty($phone)) return false;

        $url  = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.$phone;
        $res  = iconv("GB2312","UTF-8", self::https_request($url));
        $json = str_replace("__GetZoneResult_ = {", '', $res);
        $json = str_replace('	', '', $json);
        $json = str_replace(' ', '', $json);
        $json = str_replace('}', '', $json);
        $json = str_replace('
', '', $json);
        $json = explode(',', $json);
        $array = [];
        foreach ($json as $k => $v) {
            $arr = explode(':', $v);
            $key = $arr[0];
            $array[$key] = ltrim(rtrim($arr[1], "'"), "'");
        }
        if (empty($array['carrier'])) return false;
        unset($array['areaVid']);
        unset($array['ispVid']);
        return $array;
    }

    /**
     * 发送CURL请求
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 请求网址
     * @param array $data 请求内容
     * @return void 抓取内容
    */
    protected static function https_request($url, $data = null){
		$curl = curl_init();  

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		$response = curl_exec($curl);
		curl_close($curl);
		
		return $response;
	}
}