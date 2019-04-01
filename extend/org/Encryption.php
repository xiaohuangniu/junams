<?php
// +----------------------------------------------------------------------
// | 简单密码本加密类
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Encryption{

    /**
     * 执行加密
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @param string $str 加密串
     * @param string $key 自定义私钥，不能为中文
     * @return string 加密后的结果
    */
    public static function run($str='', $key=''){
        $pod = '';
        # 1.循环读取字符串,使用键值替换加密
        for ($i=0; $i<=strlen($str); $i++) {
            # 每次向上读取一个字符串
            $val  = substr($str,$i,1);
            # 使用键值替换函数,将字符替换
            $pod .= self::unhtml($val);
        }
        # 获取字符串长度
        $leng2 = mb_strlen($pod);   
        # 获得一个不会大于字符串长度的随机数
        $red2=random_int(0,$leng2);
        # 2.插入自定义密文
        $need2 = substr($pod, 0, $red2) .$key. substr($pod, $red2, $leng2);
        # 3.base加密
        $base = base64_encode($need2);
        $pod2 = '';
        # 4.再次使用循环读取字符串,使用键值替换加密
        for ($i=0; $i<=strlen($base); $i++) {
            $str2 = substr($base,$i,1);
            $pod2 .= self::unhtml($str2);
        }
        return $pod2;
    }

    /**
     * 执行解密
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @param string $pod 加密串
     * @param string $key 自定义私钥
     * @return string 解密后的结果
    */
    public static function decrypt($pod='', $key=''){
        $pod2 = '';
        # 1.使用循环读取字符串,使用键值逆换
        for ($i=0; $i<=strlen($pod); $i++) {
            $str   = substr($pod,$i,1);
            $pod2 .= self::unhtml($str);
        }
        # 2.使用base逆换
        $base = base64_decode($pod2);   
        # 3.去除私钥
        $pod3 = str_replace($key, '', $base);
        $pod4 = '';
        # 4.再次使用循环读取字符串,使用键值逆换
        for ($i=0; $i<=strlen($pod3); $i++) {
            $str2  = substr($pod3,$i,1);
            $pod4 .= self::unhtml($str2);
        }
        return $pod4;
    }
    
    /**
     * 密码表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @param string $content 加密串
     * @return string 加密后的结果
    */
    private static function unhtml($content) {
        switch ($content){
            case 'q': $content=str_replace("q","h",$content);break;
            case 'w': $content=str_replace("w","z",$content);break;
            case 'e': $content=str_replace("e","p",$content);break;
            case 'r': $content=str_replace("r","x",$content);break;
            case 't': $content=str_replace("t","m",$content);break;
            case 'y': $content=str_replace("y","d",$content);break;
            case 'u': $content=str_replace("u","j",$content);break;
            case 'i': $content=str_replace("i","o",$content);break;
            case 'o': $content=str_replace("o","i",$content);break;
            case 'p': $content=str_replace("p","e",$content);break;
            case 'f': $content=str_replace("f","a",$content);break;
            case 's': $content=str_replace("s","l",$content);break;
            case 'd': $content=str_replace("d","y",$content);break;
            case 'f': $content=str_replace("f","a",$content);break;
            case 'g': $content=str_replace("g","b",$content);break;
            case 'h': $content=str_replace("h","q",$content);break;
            case 'j': $content=str_replace("j","u",$content);break;
            case 'k': $content=str_replace("k","c",$content);break;
            case 'l': $content=str_replace("l","s",$content);break;
            case 'z': $content=str_replace("z","w",$content);break;
            case 'x': $content=str_replace("x","r",$content);break;
            case 'c': $content=str_replace("c","k",$content);break;
            case 'v': $content=str_replace("v","n",$content);break;
            case 'b': $content=str_replace("b","g",$content);break;
            case 'n': $content=str_replace("n","v",$content);break;
            case 'm': $content=str_replace("m","t",$content);break;
            case '0': $content=str_replace("0","3",$content);break;
            case '1': $content=str_replace("1","8",$content);break;
            case '2': $content=str_replace("2","5",$content);break;
            case '3': $content=str_replace("3","0",$content);break;
            case '4': $content=str_replace("4","6",$content);break;
            case '5': $content=str_replace("5","2",$content);break;
            case '6': $content=str_replace("6","4",$content);break;
            case '7': $content=str_replace("7","9",$content);break;
            case '8': $content=str_replace("8","1",$content);break;
            case '9': $content=str_replace("9","7",$content);break;
        }
        return $content;
    }
}