<?php
// +----------------------------------------------------------------------
// | CMD命令 - ls命令
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace cmd;
use cmd\Common;
use think\Cookie;

class Ls extends Common{
    /**
     * 命令行参数
    */
    private static $_param = [];
    
    /**
     * 用于php命令行分流
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @param array $param 命令行
     * @return json
    */
    public static function run($param){
		static::$_param = $param;
		self::_Ls();
	}
	
	/**
	 * 读取命令下所处目录结构
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function _Ls() {
		# ls命令可以存在以下几种可能
		# ls 当前目录下文件结构
		# ls -i 当前目录下文件结构，忽略时间
		# ls /var/www 或者 ../var/www 指定目录结构
		# ls /var/www -i 指定目录结构，忽略时间

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;
		
		if (empty(static::$_param[1])) {
			self::complete($file);
		} else if(static::$_param[1] == '-i') {
			self::local($file);
		} else {
			if (stripos(static::$_param[1], '../') !== false) {
				if ($file == ROOT_PATH) {
					$root_path = ROOT_PATH;
				} else {
					$root_path = dirname($file).'/';
				}
				$root_path .= rtrim(str_replace('../', '', static::$_param[1]), '/').'/';
			# 从根目录进入
			} else if(static::$_param[1] != '/'){
				$root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[1]), '/'), '/').'/';
			} else {
				$root_path = ROOT_PATH;
			}

			if (!empty(static::$_param[2]) && static::$_param[2] == '-i') {
				self::local($root_path);
			} else {
				self::complete($root_path);
			}
		}

	}

	/**
	 * 局部读取
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $file
	 * @return void
	*/
	private static function local($file) {
		$html  =  '<div class="w150">名称</div>';
		$html .=  '<div class="w150">大小</div>';
		$html .=  '<div class="w150">权限</div>';
		$data[] = '打印目录：'.$file;
		$data[] =$html;

		# 开始遍历目录
		$handle = opendir($file. "."); 
		while (false !== ($url = readdir($handle))) {
			if ($url != "." && $url != "..") {
				$size  = self::Size(filesize($file.$url));
				$html  =  '<div class="w150">'. $url .'</div>';
				$html .=  '<div class="w150">'. $size .'</div>';
				$html .=  '<div class="w150">'. self::Root($file.$url) .'</div>';
				
				$data[] =$html;
			}
		}
		closedir($handle); 
		self::json('00', '处理成功', $data);
	}
	/**
	 * 完整读取
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $file 目录地址
	 * @return void
	*/
	private static function complete($file) {
		$html  =  '<div class="w150">名称</div>';
		$html .=  '<div class="w150">大小</div>';
		$html .=  '<div class="w150">创建时间</div>';
		$html .=  '<div class="w150">修改时间</div>';
		$html .=  '<div class="w150">权限</div>';
		$data[] = '打印目录：'.$file;
		$data[] =$html;

		# 开始遍历目录
		$handle = opendir($file. "."); 
		while (false !== ($url = readdir($handle))) {
			if ($url != "." && $url != "..") {
				$size  = self::Size(filesize($file.$url));
				$upd_time = date("Y-m-d H:i:s", filectime($file. $url));
				$add_time = date("Y-m-d H:i:s", filemtime($file. $url));
				$html  =  '<div class="w150">'. $url .'</div>';
				$html .=  '<div class="w150">'. $size .'</div>';
				$html .=  '<div class="w150">'. $add_time .'</div>';
				$html .=  '<div class="w150">'. $upd_time .'</div>';
				$html .=  '<div class="w150">'. self::Root($file.$url) .'</div>';
				
				$data[] =$html;
			}
		}
		closedir($handle); 
		self::json('00', '处理成功', $data);
	}

	/**
	 * 获取目录或文件权限
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $file 目录地址
	 * @return int
	*/
	private static function Root($file){
		$perms = fileperms($file);
		if (($perms & 0xC000) == 0xC000) {
			// Socket
			$info = 's';
		} elseif (($perms & 0xA000) == 0xA000) {
			// Symbolic Link
			$info = 'l';
		} elseif (($perms & 0x8000) == 0x8000) {
			// Regular
			$info = '-';
		} elseif (($perms & 0x6000) == 0x6000) {
			// Block special
			$info = 'b';
		} elseif (($perms & 0x4000) == 0x4000) {
			// Directory
			$info = 'd';
		} elseif (($perms & 0x2000) == 0x2000) {
			// Character special
			$info = 'c';
		} elseif (($perms & 0x1000) == 0x1000) {
			// FIFO pipe
			$info = 'p';
		} else {
			// Unknown
			$info = 'u';
		}

		// Owner
		$info .= (($perms & 0x0100) ? 'r' : '-');
		$info .= (($perms & 0x0080) ? 'w' : '-');
		$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));

		// Group
		$info .= (($perms & 0x0020) ? 'r' : '-');
		$info .= (($perms & 0x0010) ? 'w' : '-');
		$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));

		// World
		$info .= (($perms & 0x0004) ? 'r' : '-');
		$info .= (($perms & 0x0002) ? 'w' : '-');
		$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));

		return $info;
	}
	
	/**
	 * 字节大小转换
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param int $size 文件大小
	 * @return string
	*/
	private static function Size($size){
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte
       
        if($size < $kb){return $size." B";}
        if($size < $mb){return round($size/$kb,2)." KB";}
        if($size < $gb){return round($size/$mb,2)." MB";}
        if($size < $tb){return round($size/$gb,2)." GB";}
        return round($size/$tb,2)." TB";
    }
}