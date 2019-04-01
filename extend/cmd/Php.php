<?php
// +----------------------------------------------------------------------
// | CMD命令 - php命令
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
use think\Session;
use think\Request;
use think\Config;

class Php extends Common{
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
        switch ($param[1]) {
            case '-w': self::W(); break;
            case '-c': self::C(); break;
            case '-l': self::L(); break;
            case '-z': self::Z(); break;
            case '-m': self::M(); break;
            default: self:: json('02', 'php分支下，暂不支持该命令');
        }
    }

    /**
     * 打印服务器基本参数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function W(){
		# IP
		if('/'==DIRECTORY_SEPARATOR){$ip_name = $_SERVER['SERVER_ADDR'];}else{$ip_name = @gethostbyname($_SERVER['SERVER_NAME']);}
		$ip = '服务器域名/IP地址 - '.$_SERVER['SERVER_NAME'].'( '.$ip_name.' )';
		
		# 操作系统
		$os = explode(" ", php_uname());
		if('/'==DIRECTORY_SEPARATOR){$xp_name = $os[2];}else{$xp_name = $os[1];}
		$xp = '服务器操作系统 - '.$os[0].' 内核版本：'.$xp_name;

		# 解译引擎
		$ap = 'Apache/Nginx - '.$_SERVER['SERVER_SOFTWARE'];
		# 服务器语言
		$la = '服务器语言 - '.getenv("HTTP_ACCEPT_LANGUAGE");
		# 服务器端口
		$pt = '服务器端口 - '.$_SERVER['SERVER_PORT'];
		# 绝对路径
		$fl = $_SERVER['DOCUMENT_ROOT'] ? str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));

        $data[] = 'PHP版本 - '.PHP_VERSION;
        $data[] = 'ThinkPHP版本 - '.THINK_VERSION;
		$data[] = $ip;
		$data[] = $xp;
		$data[] = $ap;
		$data[] = $la;
		$data[] = $pt;
		$data[] = '当然项目根路径 - '.$fl;
		self::json('00','处理成功',$data);
    }
    
    /**
     * 打印服务器已编译模块
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function C() {
		$able=get_loaded_extensions();
		foreach ($able as $val) {
			$data[] = $val;
		}
		self::json('00','处理成功',$data);
    }
    
    /**
     * 打印PHP相关环境参数 系统
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function L(){
		$ve = 'PHP版本 - '.PHP_VERSION;
		$ps = 'PHP运行方式 - '.strtoupper(php_sapi_name());
		$ml = '脚本最大内存 - '. self::show("memory_limit");
		$sm = 'PHP安全模式 - '. self::show("safe_mode");
		$ms = 'POST最大限制 - '. self::show("post_max_size");
		$mf = '上传文件最大限制 - '. self::show("upload_max_filesize");
		$pr = '浮点数有效位数 - '. self::show("precision");
		$et = '脚本超时时间 - '. self::show("max_execution_time").'秒';
		$st = 'socket超时时间 - '. self::show("default_socket_timeout").'秒';
		$dr = '页面根目录【doc_root】 - '. self::show("doc_root");
		$ur = '用户根目录【user_dir】 - '. self::show("user_dir");
		$dl = 'dl()函数【enable_dl】 - '. self::show("enable_dl");	
		$ip = '是否指定包含文件根目录 - '. self::show('include_path');
		$er = '显示错误信息 - '. self::show('display_errors');
		$rg = '自定义全局变量 - '. self::show('register_globals');
		$qg = '数据反斜杠转义 - '. self::show('magic_quotes_gpc');
		$so = 'PHP短标签 - '. self::show('short_open_tag');
		$re = '忽略重复错误信息 - '. self::show('ignore_repeated_errors');
		$rs = '忽略重复的错误源 - '. self::show('ignore_repeated_source');
		$rm = '报告内存泄漏 - '. self::show('report_memleaks');
		$qg = '自动字符串转义 - '. self::show('magic_quotes_gpc');
		$qr = '外部字符串自动转义 - '. self::show('magic_quotes_runtime');
		$au = '打开远程文件 - '. self::show('allow_url_fopen');
		$ra = '声明argv和argc变量 - '. self::show('register_argc_argv');
		$cookie = isset($_COOKIE) ? '<font color="green">√</font>' : '<font color="red">×</font>';
		$ck = 'Cookie 支持 - '. $cookie;
		$ac = '拼写检查 - '. self::isfun("aspell_check_raw");
		$bc = '高精度数学运算 - '. self::isfun("bcadd");
		$pm = 'PREL相容语法 - '. self::isfun("preg_match");
		$pc = 'PDF文档支持 - '. self::isfun("pdf_close");
		$sn = 'SNMP网络管理协议 - '. self::isfun("snmpget");
		$vm = 'VMailMgr邮件处理 - '. self::isfun("vm_adduser");
		$ci = 'CURL支持 - '. self::isfun("curl_init");
		$SMTP_I = get_cfg_var("SMTP") ? '<font color="green">√</font>' : '<font color="red">×</font>';
		$sp = 'SMTP支持 - '.$SMTP_I;
		$smtp_l = get_cfg_var("SMTP") ? get_cfg_var("SMTP") : '<font color="red">×</font>';
		$su = 'SMTP地址 - '.$smtp_l;

		$data[] = $ve ;
		$data[] = $ps;
		$data[] = $ml;
		$data[] = $sm;
		$data[] = $ms;
		$data[] = $mf;
		$data[] = $pr;
		$data[] = $et;
		$data[] = $st;
		$data[] = $dr;
		$data[] = $ur;
		$data[] = $dl;
		$data[] = $ip;
		$data[] = $er;
		$data[] = $rg;
		$data[] = $qg;
		$data[] = $so;
		$data[] = $re;
		$data[] = $rs;
		$data[] = $rm;
		$data[] = $qg;
		$data[] = $qr;
		$data[] = $au;
		$data[] = $ra;
		$data[] = $ck;
		$data[] = $ac;
		$data[] = $bc;
		$data[] = $pm;
		$data[] = $pc;
		$data[] = $sn;
		$data[] = $vm;
		$data[] = $ci;
		$data[] = $sp;
		$data[] = $su;

		$disFuns = get_cfg_var("disable_functions");

		if(empty($disFuns)){
			$data[] = '被禁用的函数，系统不支持列举(或无禁用)';
		}else{ 
			$disFuns_array =  explode(',',$disFuns);
			foreach ($disFuns_array as $val) {
				$data[] = '被禁用的函数 - '.$val;
			}	
		}

		self::json('00','处理成功',$data);
    }

    /**
     * 打印PHP相关组件 扩展
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function Z(){
		$fl = 'FTP支持 - '. self::isfun('ftp_login');
		$xl = 'XML支持 - '. self::isfun('xml_set_object');
		$si = 'Session支持 - '. self::isfun('session_start');
		$sk = 'Socket支持 - '. self::isfun('socket_accept');
		$cd = 'Calendar支持 - '. self::isfun('cal_days_in_month');
		$au = '允许URL打开文件 - '. self::show('allow_url_fopen');

		if(function_exists('gd_info')) {
            $gd_info = gd_info();
	        $gd      = $gd_info["GD Version"];
	    }else{
			$gd = '<font color="red">×</font>';
		}
		$gd = 'GD库支持 - '.$gd;

		$zp = '压缩文件支持(Zlib) - '. self::isfun('gzclose');
		$ic = 'IMAP电子邮件系统函数库 - '. self::isfun('imap_close');
		$jd = '历法运算函数库 - '. self::isfun('JDToGregorian');
		$pm = '正则表达式函数库 - '. self::isfun('preg_match');
		$wd = 'WDDX支持 - '. self::isfun('wddx_add_vars');
		$ic = 'Iconv编码转换 - '. self::isfun('iconv');
		$me = 'mbstring - '. self::isfun('mb_eregi');
		$bc = '高精度数学运算 - '. self::isfun('bcadd');
		$lc = 'LDAP目录协议 - '. self::isfun('ldap_close');
		$mc = 'MCrypt加密处理 - '. self::isfun('mcrypt_cbc');
		$mo = '哈稀计算 - '. self::isfun('mhash_count');

		$data[] = $fl;
		$data[] = $xl;
		$data[] = $si;
		$data[] = $sk;
		$data[] = $cd;
		$data[] = $au;
		$data[] = $gd;
		$data[] = $zp;
		$data[] = $ic;
		$data[] = $jd;
		$data[] = $pm;
		$data[] = $wd;
		$data[] = $ic;
		$data[] = $me;
		$data[] = $bc;
		$data[] = $lc;
		$data[] = $mc;
		$data[] = $mo;

		self::json('00','处理成功',$data);
    }
    
    /**
     * 打印数据库扩展
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function M(){
		$s = '';
		$c = '';
		if(function_exists('mysql_get_server_info')) {
        	$s = @mysql_get_server_info();
			$s = '&nbsp; mysql_server 版本：'.$s;
			$c = '&nbsp; mysql_client 版本：'.@mysql_get_client_info();
		}
    
		$my_1 = 'MySQL 数据库 - '. self::isfun('mysql_close').$s;
		$my_2 = 'MySQLI 数据库 - '. self::isfun('mysqli_close').$c;
		$oc = 'ODBC 数据库 - '. self::isfun('odbc_close');
		$or = 'Oracle 数据库 - '. self::isfun('ora_close');
		$ss = 'SQL Server 数据库 - '. self::isfun('mssql_close');
		$db = 'dBASE 数据库 - '. self::isfun('dbase_close');
        $ms = 'mSQL 数据库 - '. self::isfun('msql_close');

		if(extension_loaded('sqlite3')) {
			$sqliteVer = \SQLite3::version();
			$si  = '<font color=green>√</font> ';
			$si .= "SQLite3　Ver ";
			$si .= $sqliteVer['versionString'];
		}else {
			$si  =  self::isfun("sqlite_close");
			if( self::isfun("sqlite_close") == '<font color="green">√</font>') {
				$si .= "&nbsp; 版本： ".@sqlite_libversion();
			}
		}

		$si = 'SQLite 数据库 - '.$si;
		$hw = 'Hyperwave 数据库 - '. self::isfun('hw_close');
		$ps = 'Postgre SQL 数据库 - '. self::isfun('pg_close');
		$ic = 'Informix 数据库 - '. self::isfun('ifx_close');
		$da = 'DBA 数据库 - '. self::isfun('dba_close');
		$dm = 'DBM 数据库 - '. self::isfun('dbmclose');
		$ff = 'FilePro 数据库 - '. self::isfun('filepro_fieldcount');
		$sc = 'SyBase 数据库 - '. self::isfun('sybase_close');


		$data[] = $my_1;
		$data[] = $my_2;
		$data[] = $oc;
		$data[] = $or;
		$data[] = $ss;
		$data[] = $db;
		$data[] = $ms;
		$data[] = $si;
		$data[] = $hw;
		$data[] = $ps;
		$data[] = $ic;
		$data[] = $da;
		$data[] = $dm;
		$data[] = $ff;
		$data[] = $sc;

		$data[] = '-------------------数据库链接信息如下-------------------';
		$data[] = '类型 - '. Config::get('database.type');
		$data[] = '地址 - '. Config::get('database.hostname');
		$data[] = '库名 - '. Config::get('database.database');
		$data[] = '账号 - '. Config::get('database.username');
		$data[] = '密码 - '. Config::get('database.password');
		$data[] = '端口 - '. Config::get('database.hostport');
        $data[] = '编码 - '. Config::get('database.charset');
        $data[] = '表前缀 - '. Config::get('database.prefix');

		self::json('00','处理成功',$data);
	}
 
    /**
     * 检测PHP设置参数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @param string $varName 环境参数名
     * @return string
    */
	private static function show($varName){
		switch($result = get_cfg_var($varName)){
			case 0:
				return '<font color="red">×</font>';
			break;
			
			case 1:
				return '<font color="green">√</font>';
			break;
			
			default:
				return $result;
			break;
		}
    }
    
    /**
     * 检测函数支持
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @param string $funName 函数名
     * @return string
    */
	private static function isfun($funName = ''){
		if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
		return (false !== function_exists($funName)) ? '<font color="green">√</font>' : '<font color="red">×</font>';
	}
}