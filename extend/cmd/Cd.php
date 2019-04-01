<?php
// +----------------------------------------------------------------------
// | CMD命令 - cd命令
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

class Cd extends Common{
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
		self::_Cd();
	}
	
	/**
	 * 切换命令行所处目录结构
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.22
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function _Cd() {
		# cd命令可以存在以下几种可能
		# cd ./ 回到根地址
		# cd ../ 回到上一层目录
		# cd /var/www 从根目录开始出发
		# cd ../var/www 从上一层目录出发
		# cd var 从当前目录下，寻找目录进入

		$path = Cookie::get('cmd_path');
		$path = $path ? $path : ROOT_PATH;
		
		if (static::$_param[1] == './' || static::$_param[1] == '/') {
			$root_path = ROOT_PATH;
		} elseif (static::$_param[1] == '../') {
			if ($path == ROOT_PATH) {
				$root_path = ROOT_PATH;
			} else {
				$root_path = dirname($path);
			}
		} else {
			# 当前目录进入
			if (stripos(static::$_param[1], '.') === false && stripos(static::$_param[1], '/') === false) {
				$root_path = $path.static::$_param[1].'/';
			# 从上层目录进入
			} else if (stripos(static::$_param[1], '../') !== false) {
				$root_path = dirname($path) .'/'. rtrim(str_replace('../', '', static::$_param[1]), '/').'/';
			# 从根目录进入
			} else {
				$root_path = ROOT_PATH .'/'. ltrim(rtrim(str_replace('./', '', static::$_param[1]), '/'), '/').'/';
			}

			if (!file_exists($root_path)) {
				self::json('02', $root_path .' 目录不存在');
			}
		}
		Cookie::set('cmd_path', $root_path);
		self::json('02','当前所在目录：'.$root_path);
	}

}