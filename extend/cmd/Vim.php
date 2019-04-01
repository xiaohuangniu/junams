<?php
// +----------------------------------------------------------------------
// | CMD命令 - vim命令
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace cmd;
use cmd\Common;
use think\Db;
use think\Cookie;
use think\Session;
use think\Request;

class Vim extends Common{
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
     * @version v1.0.0.9 + 2018.11.30
     * @deprecated 暂不弃用
     * @global 无
     * @param array $param 命令行
	 * @param array $param2 文件修改参数
     * @return json
    */
    public static function run($param, $param2=null){
		# 文件修改
		if ($param === true) {
			self::edit($param2);
		}

		static::$_param = $param;
		# 因为中文文件，需要转义
		if(!empty(static::$_param[1])){
			static::$_param[1] = iconv('utf-8', 'gbk', static::$_param[1]);
		}

		self::opens();
	}

	/**
	 * 修改文件内容
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.11.30
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $param2 文件修改参数
	 * @return void
	*/
	private static function edit($param2) {
		$session = Session::get('cmd_admin');
		if (!$session) {
			self:: json('00', '请先登录！');
		}
		if (!is_writable($param2['url'])) {
			self:: json('00', '文件没有写入权限！');
		}

		try {
			file_put_contents($param2['url'], $param2['content']);
		} catch( \Exception $e) {
			self::json('00', '系统发生错误：'.$e->getMessage());
		}

		$data = [
			'ca_id' => $session['ca_id'],
			'caa_time' => time(),
			'caa_content' => '提交文件修改操作：'.$param2['url'],
			'caa_ip' => Request::instance()->ip(),
		];
		Db('cmd_admin_action_log')->insert($data);

		self::json('01', '修改提交成功');
	}

	/**
	 * 打开文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.11.30
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $
	 * @param mixed $
	 * @return void
	*/
	private static function opens() {
		if (empty(static::$_param[1])) {
			self:: json('02', '请输入目录参数');
		}

		if (substr(strrchr(static::$_param[1], '.'), 1) == '') { 
			self:: json('02', '必须是带文件名的路径参数');
		}

		$path = Cookie::get('cmd_path');
		$file = $path ? $path : ROOT_PATH;
		# 当前目录进入
		if (stripos(static::$_param[1], '/') === false) {
			$root_path = $file.static::$_param[1];
		# 从上层目录进入
		} else if (stripos(static::$_param[1], '../') !== false) {
			$root_path = dirname($file) .'/'. str_replace('../', '', static::$_param[1]);
		# 从根目录进入
		} else {
			$root_path = ROOT_PATH .'/'. ltrim(str_replace('./', '', static::$_param[1]), '/');
		}

		if (!file_exists($root_path)) {
			self::json('02', $root_path .'：文件不存在');
		}

		# 获取后缀名
		$msg = pathinfo($root_path, PATHINFO_EXTENSION);

		# 过滤可以操作的后缀名
		$data = ['php', 'asp', 'java', 'py', 'go', 'json', 'txt', 'sql', 'xml', 'html', 'htm', 'md', 'env'];
		if (!in_array($msg, $data)) {
			self::json('02',  '暂不支持在线编辑：'.$msg.'类型的文件');
		}
		
		if (!is_readable($root_path)) {
			self::json('02',  $root_path.'：没有读取权限');
		}

		try {
			$content = file_get_contents($root_path);
		} catch( \Exception $e) {
			self::json('02', '系统发生错误：'.$e->getMessage());
		}

		self::json('03', $msg, [
			'url'     => $root_path,
			'content' => $content
		]);
	}

	
}