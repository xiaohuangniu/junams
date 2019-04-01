<?php
// +----------------------------------------------------------------------
// | 第三方登录 - 基类
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace oauth2\Oauth;
use think\Db;

class Basics{
	
	/**
	 * 获取配置信息
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.12.03
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return array
	*/
	public static function config() {
		return Db::name('config')->field('oauth_url,oauth_sn_appid,oauth_bd_client_secret,oauth_bd_client_id,oauth_git_client_secret, oauth_git_client_id,oauth_wb_client_secret,oauth_wb_client_id')->where('id', 1)->find();
	}

    /**
     * 发送CURL请求
     * @param string $url  请求网址
     * @param array  $data 请求内容
     * @return 抓取内容
     */
    protected static function https_request($url, $data = null){
		# 初始化一个cURL会话
		$curl = curl_init();  
		
		# 设置请求选项, 包括具体的url
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  // 禁用后cURL将终止从服务端进行验证
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);            // 设置为post请求类型
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  // 设置具体的post数据
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		$response = curl_exec($curl);                       // 执行一个cURL会话并且获取相关回复
		curl_close($curl);                                  // 释放cURL句柄,关闭一个cURL会话
		
		return $response;
	}

	/**
	 * 将参数植入占位符 - 占位符为%SS%
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.0.0.9 + 2018.12.03
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $url 占位字符串
	 * @param array $array 参数是一维数组，参数需要自行按照占位符排序排列
	 * @return string
	*/
	protected static function str_url($url, $array){
		# 循环替换占位内容
		foreach ($array as $v){
			$url = preg_replace('/%SS%/', $v, $url, 1);
		}
		return $url;
	}
}