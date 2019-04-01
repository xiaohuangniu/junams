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
 * 权限分类-递归
 * @author  小黄牛
 * @version 1.0.0.1
 * @param   array  : $cate  递归数组
 * @param   string : $name  多维节点名称
 * @param   int    : $pid   初始递归父级
 * @return  array  : 多维数组
*/
function menuFor ($cate, $name = 'children', $pid = 0) {
    $arr = [];

    foreach ($cate as $v) {
        if ($v['pid'] == $pid) {
            if (!isset($v['m_display'])) {
                $v[$name] = menuFor($cate, $name, $v['id']);
                $v['num'] = count($v[$name]);
                $arr[] = $v;
            } else {
                if ($v['m_display'] == 1) {
                    $v[$name] = menuFor($cate, $name, $v['id']);
                    $v['num'] = count($v[$name]);
                    $arr[] = $v;
                }
            }
            
        }
    }
    return $arr;
}

/**
 * 角色权限-新增-递归
 * @author  小黄牛
 * @version 1.0.0.1
 * @param  array  : $cate  递归数组
 * @param  string : $name  多维节点名称
 * @param  int    : $pid   初始递归父级
 * @return array  : 多维数组
*/
function roleAdd ($cate, $name = 'children', $pid = 0) {
    $arr = [];

    foreach ($cate as $v) {
        if ($v['pid'] == $pid) {
            unset($v['pid']);
            // 默认顶级打开，下级闭合树形
            if ($pid == 0) {
                $v['spread'] = true;
            } else {
                $v['spread'] = false;
            }
            
            $v[$name] = roleAdd($cate, $name, $v['checkboxValue']);
            $arr[] = $v;
        }
    }
    return $arr;
}

/**
 * 角色权限-修改-递归
 * @author  小黄牛
 * @version 1.0.0.1
 * @param  array  : $cate  递归数组
 * @param  string : $id    已有权限节点
 * @param  string : $name  多维节点名称
 * @param  int    : $pid   初始递归父级
 * @return array  : 多维数组
*/
function roleUpd ($cate, $id, $name = 'children', $pid = 0) {
    $arr = [];
    if (!is_array($id)) $id = explode(',', $id);

    foreach ($cate as $v) {
        if ($v['pid'] == $pid) {
            unset($v['pid']);
            if (in_array($v['checkboxValue'], $id)) $v['checked'] = true;
            $v['spread'] = true;
            $v[$name] = roleUpd($cate, $id,$name, $v['checkboxValue']);
            $arr[] = $v;
        }
    }
    return $arr;
}

/**
 * 获得IP的真实地理信息 - TaoBao
 * @author  小黄牛
 * @version 1.0.0.1
 * @param   string : $ip IP地址
 * @return  array  : 返回成功查询后的数组
*/
function isTaobao($ip=''){
	if(empty($ip)){    
       return '请输入IP地址';  
    }   
	$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
    $ip=json_decode(@file_get_contents($url));
	if(empty($ip) || (string)$ip->code=='1'){
  		return false;
  	}
	$data = (array)$ip->data;
	return $data; 
}

/**
 * 获取MYSQL版本信息
 * @author  小黄牛
 * @version 1.0.0.1
 */
function get_mysql_server(){
    $version = db()->query("select version() as ver");
    return $version[0]['ver'];
}

/**
 * 字节大小转换函数
 * @author  小黄牛
 * @version 1.0.0.1
 * @param int $size 字节数
 * @return string 转换后的单位数
 */
function formatBytes($size) { 
    $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
    for ($i = 0; $size >= 1024 && $i < 4; $i++) {
        $size /= 1024; 
    }
    return round($size, 2).$units[$i]; 
 }

 /**
  * 时间戳转换成日期说明
  * @todo 无
  * @author 小黄牛
  * @version v1.1.4 + 2019.03.21
  * @deprecated 暂不弃用
  * @global 无
  * @param int $时间戳
  * @return string 转换后的说明
 */
function time_tran($the_time) { 
    $now_time = date("Y-m-d H:i:s", time()); 
    $now_time = strtotime($now_time); 
    $show_time = $the_time; 
    $dur = $now_time - $show_time; 

    if ($dur < 60) { 
        return $dur . '秒前'; 
    } else { 
        if ($dur < 3600) { 
            return floor($dur / 60) . '分钟前'; 
        } else { 
            if ($dur < 86400) { 
                return floor($dur / 3600) . '小时前'; 
            } else { 
                if ($dur < 259200) {//3天内 
                    return floor($dur / 86400) . '天前'; 
                } else { 
                    return date("Y-m-d H:i:s", $the_time); 
                } 
            } 
        } 
    } 
} 

/**
 * 目录转义与反转
 * @todo 无
 * @author 小黄牛
 * @version v1.1.4 + 2019.03.21
 * @deprecated 暂不弃用
 * @global 无
 * @param string $url 转义路径
 * @param bool $status 是否反转
 * @return void
*/
function url_tran($url, $status=false) {
    if ($status) {
        $url = str_replace('!', '/', $url);
        $url = str_replace('*', '\\', $url);
        $url = str_replace('.xxx', '.php', $url);
        $url = str_replace('.kkk', '.html', $url);
    } else {
        $url = str_replace('/', '!', $url);
        $url = str_replace('\\', '*', $url);
        $url = str_replace('.php', '.xxx', $url);
        $url = str_replace('.html', '.kkk', $url);
    }
    return $url;
}