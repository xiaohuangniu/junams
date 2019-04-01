<?php
// +----------------------------------------------------------------------
// | CMD命令 - tk命令
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
use think\Session;

class Tk extends Common{
    /**
     * 命令行参数
    */
	private static $_param = [];
	/**
	 * 删除目录日志
	*/
	private static $_log = [];
    
    /**
     * 用于php命令行分流
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.23
     * @deprecated 暂不弃用
     * @global 无
     * @param array $param 命令行
     * @return json
    */
    public static function run($param){
		static::$_param = $param;
		# 第3-4个参数，不管是不是中文，先过滤一遍
		# 因为中文文件夹，需要转义
		if(!empty(static::$_param[2])){
			static::$_param[2] = iconv('utf-8', 'gbk', static::$_param[2]);
		}
		if(!empty(static::$_param[3])){
			static::$_param[3] = iconv('utf-8', 'gbk', static::$_param[3]);
		}

		switch ($param[1]) {
            case '-d': self::D(); break;
			case '-u': self::U(); break;
			case '-c': self::C(); break;
            default: self:: json('02', 'php分支下，暂不支持该命令');
		} 
	}

	/**
	 * 删除文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function D(){
		# -d指令可能存在以下形式：
		# tk -d 目录地址 删除该文件
		# tk -d 目录地址 -i 如果删除文件后目录为空，则把目录也删除。

		$session = Session::get('cmd_admin');
		if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许删除目录');
		
		if (empty(static::$_param[2])) {
			self:: json('02', '请输入目录参数');
		}

		if (substr(strrchr(static::$_param[2], '.'), 1) == '') { 
			self:: json('02', '必须是带文件名的路径参数');
		}

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;
		# 当前目录进入
		if (stripos(static::$_param[2], '/') === false) {
			$root_path = $file.static::$_param[2];
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$root_path = dirname($file) .'/'. str_replace('../', '', static::$_param[2]);
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH .'/'. ltrim(str_replace('./', '', static::$_param[2]), '/');
		}

		if (!file_exists($root_path)) {
			self::json('02', $root_path .'：文件不存在');
		}

		try {
			unlink($root_path);
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}

		if (!empty(static::$_param[3]) && static::$_param[3] == '-i') {
			$fp = dirname($root_path);
			$H  = @opendir($fp);
			$i = 0;
			while ($_file=readdir($H)) {
				$i++;
			}
			closedir($H);
			# 大于2就是还有文件
			if($i==2){
				rmdir($fp);
			}
		}

		self::json('02', '文件删除成功');
	}

	/**
	 * 修改文件名
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function U(){
		# -u指令可能存在以下形式：
		# tk -u test.txt test2.txt 修改文件名称,test修改为test4
		# tk -u test.txt /runtime/test2.txt 迁移文件
		# tk -u test.txt /runtime/test2.txt -c 复制文件
		$session = Session::get('cmd_admin');
		if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许修改文件');

		if (empty(static::$_param[2])) {
			self:: json('02', '请输入原始文件路径');
		}

		if (empty(static::$_param[3])) {
			self:: json('02', '请输入变更文件路径');
		}

		if (static::$_param[3] == static::$_param[2]) {
			self:: json('02', '变更路径不能与原文件路径一致');
		}

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;

		# 当前目录进入
		if (stripos(static::$_param[2], '/') === false) {
			$a_root_path = $path.static::$_param[2];
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$a_root_path = dirname($path) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/');
		# 从根目录进入
		} else {
			$a_root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/');
		}

		# 当前目录进入
		if (stripos(static::$_param[3], '/') === false) {
			$b_root_path = $path.static::$_param[3];
		# 从上层目录进入
		} else if (stripos(static::$_param[3], '../') !== false) {
			$b_root_path = dirname($path) .'/'. rtrim(str_replace('../', '', static::$_param[3]), '/');
		# 从根目录进入
		} else {
			$b_root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[3]), '/'), '/');
		}

		if (!file_exists($a_root_path)) { self::json('02', '原文件不存在'); }
		# 关闭这条是为了可以迁移文件
		//if (file_exists($b_root_path))  { self::json('02', '变更文件地址已存在');}

		try {
			# 复制文件
			if (!empty(static::$_param[4]) && static::$_param[4] == '-c') {
				copy($a_root_path, $b_root_path);
			} else {
				rename($a_root_path, $b_root_path);
			}
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}

		if (!empty(static::$_param[4]) && static::$_param[4] == '-c') {
			self::json('02', '文件复制成功');
		} else {
			self::json('02', '文件修改成功');
		}
		
	}

	/**
	 * 设置文件权限
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.11.30
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function C(){
		# -c指令可能存在以下形式：
		# tk -c 文件地址，默认0755权限

		if (empty(static::$_param[2])) {
			self:: json('02', '请输入原始文件路径');
		}
		if (empty(static::$_param[3])) {
			static::$_param[3] = 0755;
		}
		# 一些允许创建的权限
		switch (static::$_param[3]) {
			case '0444' : static::$_param[3] = 0444;break;
			case '0754' : static::$_param[3] = 0754;break;
			case '0755' : static::$_param[3] = 0755;break;
			case '0756' : static::$_param[3] = 0756;break;
			case '0757' : static::$_param[3] = 0757;break;
			case '0764' : static::$_param[3] = 0764;break;
			case '0765' : static::$_param[3] = 0765;break;
			case '0766' : static::$_param[3] = 0766;break;
			case '0767' : static::$_param[3] = 0767;break;
			case '0774' : static::$_param[3] = 0774;break;
			case '0775' : static::$_param[3] = 0775;break;
			case '0776' : static::$_param[3] = 0776;break;
			case '0777' : static::$_param[3] = 0777;break;
		}
		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;

		# 当前目录进入
		if (stripos(static::$_param[2], '/') === false) {
			$root_path = $path.static::$_param[2];
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$root_path = dirname($path) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/');
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/');
		}

		if (!file_exists($root_path)) {
			self::json('02', $root_path .'：文件不存在');
		}

		try {
			# linux无法修改成0777，最大支持到0755
			chmod($root_path, static::$_param[3]);
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}
		self::json('02', '权限修改成功');
	}
	
}