<?php
// +----------------------------------------------------------------------
// | 获取网站收录量接口
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Indexes{
     protected static $url; // 查询网址

      /**
       * 获取收录量
       * @todo 无
       * @author 小黄牛
       * @version v1.0.0.5 + 2018.10.12
       * @deprecated 暂不弃用
       * @global 无
       * @param string $type 查询类型 baidu | 360 | sougou
       * @param string $url  查询网址
       * @return array
      */
     public static function run($type='', $url=''){
        if (empty($type)) return self::returnEcho('01', '查询类型不允许为空');
        if (empty($type)) return self::returnEcho('02', '查询网址不允许为空');

        self::$url = $url;

        switch ($type){
            case 'baidu' : return self::baidu();  break;  
            case '360'   : return self::so();     break;
            case 'sougou': return self::sougou(); break;
            default: return self::returnEcho('03', '暂无该查询类型');
        }

     }

     /**
      * 组合返回内容
      * @todo 无
      * @author 小黄牛
      * @version v1.0.0.5 + 2018.10.12
      * @deprecated 暂不弃用
      * @global 无
      * @param string $code 状态码
      * @param mixed  $msg  返回说明
      * @param mixed  $data 返回内容
      * @return void
      */
     protected static function returnEcho($code , $msg, $data=''){
        return [
            'code' => "'{$code}'",
            'msg'  => $msg,
            'data' => $data,
        ];
     }

     /**
      * 百度查询
      * @todo 无
      * @author 小黄牛
      * @version v1.0.0.5 + 2018.10.12
      * @deprecated 暂不弃用
      * @global 无
      * @return void
      */
    protected static function baidu(){
        $site_url = 'http://www.baidu.com/s?wd=site%3A';
        $all      = $site_url . self::$url;
        $content  = file_get_contents($all);

        $data     = explode('找到相关结果约', $content);

        if (count($data) > 1) {
            $array    = explode('<', str_replace('个', '', $data[1]));
            $num      = str_replace(',', '', $array[0]);
            return self::returnEcho('00', '成功', $num);
        }
        return self::returnEcho('00', '成功', 0);
    }

    /**
     * 360查询
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
     */   
    protected static function so(){
        $site_url = 'https://www.so.com/s?q=site%3A';
        $all      = $site_url . self::$url;
        $content  = file_get_contents($all);
        $data     = explode('找到相关结果约', $content);

        if (count($data) > 1) {
            $array = explode('个</span>', $data[1]);
            return self::returnEcho('00', '成功', $array[0]);
        }
        return self::returnEcho('00', '成功', 0);
    }

    /**
     * 搜狗查询
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
     */   
    protected static function sougou(){
        $site_url = 'https://www.sogou.com/web?query=site%3A';
        $all      = $site_url . self::$url;
        $content  = file_get_contents($all);
        $data     = explode('找到约', $content);

        if (count($data) > 1) {
            $array = explode('条相关', $data[1]);
            return self::returnEcho('00', '成功', $array[0]);
        }
        return self::returnEcho('00', '成功', 0);
    }

    /**
     * 抓取https的网页内容
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 请求网址
     * @return 抓取内容
     */
    protected static function Curl_Https($url, $data=''){ 
        $curl = curl_init();                           // 启动一个CURL会话  
        curl_setopt($curl, CURLOPT_URL, $url);         // 要访问的地址  
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查  
        curl_setopt($curl, CURLOPT_POST, 1);           // 发送一个常规的Post请求  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 不允许直接输出
        $tmpInfo = curl_exec($curl);                   // 执行操作  
        curl_close($curl);                             // 关闭CURL会话  
        return $tmpInfo;
    } 
}