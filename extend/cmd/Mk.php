<?php
// +----------------------------------------------------------------------
// | CMD命令 - mk命令
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

class Mk extends Common{
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
            case '-a': self::A(); break;
            case '-d': self::D(); break;
			case '-u': self::U(); break;
			case '-c': self::C(); break;
            default: self:: json('02', 'php分支下，暂不支持该命令');
        }
	}

	/**
	 * 创建新目录
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function A(){
		# -a指令可能存在以下形式：
		# mk -a 目录地址 创建该目录，默认0755权限
		# mk -a 目录地址 0777 创建该目录，指定0777权限，（注意：linux下最高只支持0755）

		if (empty(static::$_param[2])) {
			self:: json('02', '请输入目录参数');
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
		if (stripos(static::$_param[2], '.') === false && stripos(static::$_param[2], '/') === false) {
			$root_path = $file.static::$_param[2].'/';
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$root_path = dirname($file) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/').'/';
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH .'/'. ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/').'/';
		}

		if (file_exists($root_path)) {
			self::json('02', $root_path .'：目录已存在');
		}

		try {
			# linux无法创建0777的目录，最大支持到0755
			mkdir($root_path, static::$_param[3]);
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}
		self::json('02', '目录创建成功');
	}

	/**
	 * 删除目录
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function D(){
		# -d指令可能存在以下形式：
		# mk -d 目录地址 删除该目录

		$session = Session::get('cmd_admin');
		if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许删除目录');
		
		if (empty(static::$_param[2])) {
			self:: json('02', '请输入目录参数');
		}
		if (static::$_param[2] == '/' || static::$_param[2] == './') {
			self:: json('02', '为防止项目泄露，不允许删除根目录');
		}
		if (static::$_param[2] == '/application' || static::$_param[2] == './application' || static::$_param[2] == '/application/' || static::$_param[2] == './application/' ) {
			self:: json('02', '为防止项目泄露，不允许删除ThinkPHP5框架的应用根目录');
		}

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;
		
		# 当前目录进入
		if (stripos(static::$_param[2], '.') === false && stripos(static::$_param[2], '/') === false) {
			$root_path = $file.static::$_param[2].'/';
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$root_path = dirname($file) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/').'/';
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH .'/'. ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/').'/';
		}

		if (!file_exists($root_path)) {
			self::json('02', $root_path .'：目录不存在');
		}

		self::my_del($root_path);
		self::json('00', '处理成功', self::$_log);	
	}

	/**
	 * 修改目录名
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function U(){
		# -u指令可能存在以下形式：
		# mk -u test test2 修改目录名称,test修改为test4
		# mk -u test /runtime/test2/ 迁移目录

		$session = Session::get('cmd_admin');
		if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许修改目录');
		
		if (empty(static::$_param[2])) {
			self:: json('02', '请输入原始目录路径');
		}

		if (empty(static::$_param[3])) {
			self:: json('02', '请输入变更路径');
		}

		if (static::$_param[3] == static::$_param[2]) {
			self:: json('02', '变更路径不能与原路径一致');
		}

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;

		# 当前目录进入
		if (stripos(static::$_param[2], '.') === false && stripos(static::$_param[2], '/') === false) {
			$a_root_path = $file.static::$_param[2].'/';
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$a_root_path = dirname($file) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/').'/';
		# 从根目录进入
		} else {
			$a_root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/').'/';
		}

		# 当前目录进入
		if (stripos(static::$_param[3], '.') === false && stripos(static::$_param[3], '/') === false) {
			$b_root_path = $file.static::$_param[3].'/';
		# 从上层目录进入
		} else if (stripos(static::$_param[3], '../') !== false) {
			$b_root_path = dirname($file) .'/'. rtrim(str_replace('../', '', static::$_param[3]), '/').'/';
		# 从根目录进入
		} else {
			$b_root_path = ROOT_PATH . ltrim(rtrim(str_replace('./', '', static::$_param[3]), '/'), '/').'/';
		}

		if (!file_exists($a_root_path)) { self::json('02', '原始目录不存在'); }
		# 关闭这条是为了可以迁移目录
		//if (file_exists($b_root_path))  { self::json('02', '变更目录已存在');}

		try {
			$res = rename($a_root_path, $b_root_path);
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}
		self::json('02', '目录修改成功');
	}

	/**
	 * 删除目录包括里面的文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.8 + 2018.11.23
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $path   完整路径
	 * @return void
	*/
	private static function my_del($path){
		if(is_dir($path)){
				try {
					# 这两个地方最好还是要用@屏蔽一下warning错误,看着闹心
					$file_list = scandir($path);
				} catch( \Exception $e) {
					$file_list = [];
					self::$_log[] = $path.' <a style="color:red">系统发生错误：'.$e->getMessage().'<a>';
				}

				foreach ($file_list as $file){
					if ($file != '.' && $file != '..'){
						self::my_del($path.$file);
					}
				}
				
				try {
					# 这种方法不用判断文件夹是否为空,  因为不管开始时文件夹是否为空,到达这里的时候,都是空的 
					$info = rmdir($path);
				} catch( \Exception $e) {
					$info = false;
					self::$_log[] = $path.' <a style="color:red">系统发生错误：'.$e->getMessage().'<a>';
				}

				if($info){
					self::$_log[] = $path.' 删除成功';
				}  
		}else{
			try {
				# 这两个地方最好还是要用@屏蔽一下warning错误,看着闹心
				$info = unlink($path);
			} catch( \Exception $e) {
				$info = false;
				self::$_log[] = $path.' <a style="color:red">系统发生错误：'.$e->getMessage().'<a>';
			}

			if($info){
				self::$_log[] = $path.' 删除成功';
			}
		}
	}

	/**
	 * 设置目录权限
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.11.30
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private static function C(){
		# -c指令可能存在以下形式：
		# mk -c 目录地址，默认0755权限

		if (empty(static::$_param[2])) {
			self:: json('02', '请输入目录参数');
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
		if (stripos(static::$_param[2], '.') === false && stripos(static::$_param[2], '/') === false) {
			$root_path = $file.static::$_param[2].'/';
		# 从上层目录进入
		} else if (stripos(static::$_param[2], '../') !== false) {
			$root_path = dirname($file) .'/'. rtrim(str_replace('../', '', static::$_param[2]), '/').'/';
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH .'/'. ltrim(rtrim(str_replace('./', '', static::$_param[2]), '/'), '/').'/';
		}

		if (!file_exists($root_path)) {
			self::json('02', $root_path .'：目录不存在');
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