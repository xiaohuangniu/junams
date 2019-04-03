<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 过滤敏感词
 * @todo 无
 * @author 小黄牛
 * @version v1.2.1 + 2019.04.02
 * @deprecated 暂不弃用
 * @global 无
 * @param string $str 需要被过滤的字符串
 * @return array['code'=>'bool', 'msg'=>'包含的敏感词']
*/
function vif_sensitive($str=null) {
    $path = ROOT_PATH . 'public' .DS. 'txt' .DS. 'sensitive.conf';
    $content = file_get_contents($this->SENSITIVE_PATH);

    if (!empty($content)) {
        $list = explode('|', $content);
        foreach ($list as $v) {
            if (stripos($str, $v) !== false) {
                return ['code'=>false, 'msg'=>$v];
            }
        }
    }

    return ['code'=>true, 'msg'=>''];
}