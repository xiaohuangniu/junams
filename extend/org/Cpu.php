<?php
// +----------------------------------------------------------------------
// | CPU统计
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Cpu {
    /*
     * 服务器参数
    */
    private static $S = [
        'YourIP',    // 你的IP
        'DomainIP',  // 服务器域名和IP及进程用户名
        'Flag',      // 服务器标识
        'OS',        // 服务器操作系统具体
        'Language',  // 服务器语言
        'Name',      // 服务器主机名
        'Email',     // 服务器管理员邮箱
        'WebEngine', // 服务器WEB服务引擎
        'WebPort',   // web服务端口
        'WebPath',   // web路径
        'ProbePath', // 本脚本所在路径
        'sTime'      // 服务器时间
    ];
    
    /*
     * 系统信息，linux
    */
    private static $sysInfo;
    /*
     * CPU 使用情況
    */
    private static $CPU_Use;

    private static $hd = [
        't',   // 硬盘总量
        'f',   // 可用
        'u',   // 已用
        'PCT', // 使用率
    ];

    /*
     * 网卡流量
    */
    private static $NetWork = [
        'NetWorkName', // 网卡名称
        'NetOut',      // 出网总量
        'NetInput',    // 入网总量
        'OutSpeed',    // 出网速度
        'InputSpeed'   // 入网速度
    ];

    /**
     * 获得服务器基本信息
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return array
    */
    public static function get_server() {
        self::$S['YourIP']    = @$_SERVER['REMOTE_ADDR'];
        $domain               = self::OS() ? $_SERVER['SERVER_ADDR'] : @gethostbyname($_SERVER['SERVER_NAME']);
        self::$S['DomainIP']  = @get_current_user().' - '.$_SERVER['SERVER_NAME'].'('.$domain.')';
        self::$S['Flag']      = empty(self::$sysInfo['win_n']) ? @php_uname() : self::$sysInfo['win_n'];
        $OS                   = explode(" ", php_uname());
        $OSkernel             = self::OS()?$OS[2]:$OS[1];
        self::$S['OS']        = $OS[0].'内核版本：'.OSkernel;
        self::$S['Language']  = getenv("HTTP_ACCEPT_LANGUAGE");
        self::$S['Name']      = self::OS()?$OS[1]:$OS[2];
        self::$S['Email']     = $_SERVER['SERVER_ADMIN'];
        self::$S['WebEngine'] = $_SERVER['SERVER_SOFTWARE'];
        self::$S['WebPort']   = $_SERVER['SERVER_PORT'];
        self::$S['WebPath']   = $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));
        self::$S['ProbePath'] = str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];
        self::$S['sTime']     = date('Y-m-d H:i:s');
        return self::$S;
    }

    /**
     * 获取linux内存使用情况
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public static function get_linux(){
        // 获取CPU信息
        $str = @file("/proc/cpuinfo");
        if(!$str)return false;
        $str= implode("",$str);
        @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s",$str, $model);//CPU 名称
        @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/",$str, $mhz);//CPU频率
        @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/",$str, $cache);//CPU缓存
        @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/",$str, $bogomips);//
        if(is_array($model[1])){
            $cpunum= count($model[1]);
            $x1= $cpunum>1?' ×'.$cpunum:'';
            $mhz[1][0] =' | 频率:'.$mhz[1][0];
            $cache[1][0] =' | 二级缓存:'.$cache[1][0];
            $bogomips[1][0] =' | Bogomips:'.$bogomips[1][0];
            $res['cpu']['num'] = $cpunum;
            $res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$bogomips[1][0].$x1;
            if(!empty($res['cpu']['model']) && is_array($res['cpu']['model']))$res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
            if(!empty($res['cpu']['mhz']) && is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
            if(!empty($res['cpu']['cache']) && is_array($res['cpu']['cache']))$res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
            if(!empty($res['cpu']['bogomips']) && is_array($res['cpu']['bogomips']))$res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']);
        }
        //服务器运行时间
        $str = @file("/proc/uptime");
        if(!$str)return false;
        $str      = explode(" ", implode("",$str));
        $str      = trim($str[0]);
        $min      = $str/60;
        $hours    = $min/60;
        $days     = floor($hours/24);
        $hours    = floor($hours-($days*24));
        $min      = floor($min-($days*60*24)-($hours*60));
        $res['uptime'] = $days."天".$hours."小时".$min."分钟";
        //内存
        $str= @file("/proc/meminfo");
        if(!$str)return false;
        $str= implode("",$str);
        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s",$str, $buf);
        preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s",$str, $buffers);
        $resmem['memTotal']         = round($buf[1][0]/1024, 2);
        $resmem['memFree']          = round($buf[2][0]/1024, 2);
        $resmem['memBuffers']       = round($buffers[1][0]/1024, 2);
        $resmem['memCached']        = round($buf[3][0]/1024, 2);
        $resmem['memUsed']          = $resmem['memTotal']-$resmem['memFree'];
        $resmem['memPercent']       = (floatval($resmem['memTotal'])!=0)?round($resmem['memUsed']/$resmem['memTotal']*100,2):0;
        $resmem['memRealUsed']      = $resmem['memTotal'] -$resmem['memFree'] -$resmem['memCached'] -$resmem['memBuffers'];          //真实内存使用
        $resmem['memRealFree']      = $resmem['memTotal'] -$resmem['memRealUsed'];                                                   //真实空闲
        $resmem['memRealPercent']   = (floatval($resmem['memTotal'])!=0)?round($resmem['memRealUsed']/$resmem['memTotal']*100,2):0;  //真实内存使用率
        $resmem['memCachedPercent'] = (floatval($resmem['memCached'])!=0)?round($resmem['memCached']/$resmem['memTotal']*100,2):0;   //Cached内存使用率
        $resmem['swapTotal']        = round($buf[4][0]/1024, 2);
        $resmem['swapFree']         = round($buf[5][0]/1024, 2);
        $resmem['swapUsed']         = round($resmem['swapTotal']-$resmem['swapFree'], 2);
        $resmem['swapPercent']      = (floatval($resmem['swapTotal'])!=0)?round($resmem['swapUsed']/$resmem['swapTotal']*100,2):0;
        $resmem= self::formatmem($resmem);//格式化内存显示单位
        $res= array_merge($res, $resmem);
        // LOAD AVG 系统负载
        $str= @file("/proc/loadavg");
        if(!$str) return false;
        $str= explode(" ", implode("",$str));
        $str= array_chunk($str, 4);
        $res['loadAvg'] = implode(" ", $str[0]);
        return $res;
    }
    
    /**
     * 获得网卡流量
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return array
    */
    public static function get_work(){
        $strs= @file("/proc/net/dev");
        $lines= count($strs);
        for($i=2;$i < $lines;$i++) {
            preg_match_all("/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/",$strs[$i],$info );
            $res['OutSpeed'][$i]    = self::formatsize($info[10][0]);
            $res['InputSpeed'][$i]  = self::formatsize($info[2][0]);
            $res['NetOut'][$i]      = $info[10][0];
            $res['NetInput'][$i]    = $info[2][0];
            $res['NetWorkName'][$i] = $info[1][0];
        }
        return $res;
    }

    /**
     * 获得硬盘使用情况
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return array
    */
    public static function get_disk(){
        $d['t']   = round(@disk_total_space(".")/(1024*1024*1024),3);
        $d['f']   = round(@disk_free_space(".")/(1024*1024*1024),3);
        $d['u']   = $d['t']-$d['f'];
        $d['PCT'] = (floatval($d['t'])!=0)?round($d['u']/$d['t']*100,2):0;
        return $d;
    }

    /**
     * 获得PHP已编译模块
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return string
    */
    public static function get_phpexts(){
        $able= get_loaded_extensions();
        $str= '';
        foreach ($able as $key => $value) {
            $str.= "<font class='layui-btn layui-btn-sm layui-btn-radius layui-btn-danger'>$value</font>";
        }
        return $str;
    }

    /**
     * 获得PHP被禁用的函数
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return string
    */
    public static function get_deletefuns(){
        $disFuns = get_cfg_var("disable_functions");
        $str = '';
        if (empty($disFuns)){
            $str = "<font class='layui-btn layui-btn-sm layui-btn-radius layui-btn-danger'>无</font>";
        }else{
            $disFunsarr= explode(',',$disFuns);
            foreach($disFunsarr as $key=>$value) {
                $str.= "<font class='layui-btn layui-btn-sm layui-btn-radius layui-btn-danger'>$value</font>";
            }
        }
        return$str;
    }

    /**
     * 获得全部进程列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return array
    */
    public static function get_process() {
        $retval = [];
        exec('ps -eo user,pid,ppid,c,stime,time,size,rss,nice,stat,cmd', $retval, $status);
        if ($status == 0) {
            foreach ($retval as $k => $v) {
                if (stripos($v, 'php') === false && $k!=0) {
                    unset($retval[$k]);
                } else {
                    $retval[$k] = [];
                    if ($k == 0) {
                        $retval[$k] = [
                            '拥有者',
                            '进程ID',
                            '父进程ID',
                            'CPU占用率(%)',
                            '进程创建时间',
                            'CPU占用时间',
                            '内存大小(MB)',
                            '进程使用的总物理内存数(MB)',
                            '进程优先级(max-20)',
                            '进程状态',
                            'status'=>'状态解释',
                            '命令位置',
                        ];
                        continue;
                    }
                    
                    $array = explode(' ', $v);
                    foreach ($array as $key => $val) {
                        if ($val === '') {
                            unset($array[$key]);
                        }
                    }
                    $array = array_values($array);
                    foreach ($array as $key => $val) {
                        if ($key >= 10) {
                            if (empty($retval[$k][10])) {
                                $retval[$k][10] = $val;
                            } else {
                                $retval[$k][10] .= ' '.$val;
                            }
                        } else {
                            if ($key == 6 || $key == 7) {
                                $retval[$k][$key] = round($val / 1024, 2);
                            } else if ($key == 9) {
                                $content = '';
                                if (strpos($val, 'D') !== false) {
                                    $content .= '不可中断';
                                } else if (strpos($val, 'R') !== false) {
                                    $content .= '正在运行，或在队列中';
                                } else if (strpos($val, 'S') !== false) {
                                    $content .= '休眠中';
                                } else if (strpos($val, 'T') !== false) {
                                    $content .= '停止或被追踪';
                                } else if (strpos($val, 'Z') !== false) {
                                    $content .= '僵尸进程';
                                } else if (strpos($val, 'W') !== false) {
                                    $content .= '进入内存交换';
                                } else if (strpos($val, 'X') !== false) {
                                    $content .= '死掉的进程';
                                } else if (strpos($val, 'I') !== false) {
                                    $content .= '空闲';
                                }

                                if (strpos($val, '<') !== false) {
                                    $content .= ' 高优先级';
                                } 

                                if (stripos($val, 'n') !== false) {
                                    $content .= ' 低优先级';
                                } 

                                if (strpos($val, 'L') !== false) {
                                    $content .= ' 被锁在内存中';
                                } 

                                if (strpos($val, 'l') !== false) {
                                    $content .= ' 多线程';
                                } 

                                if (strpos($val, 's') !== false) {
                                    $content .= ' 包含子进程';
                                } 

                                if (strpos($val, '+') !== false) {
                                    $content .= ' 位于后台的进程组';
                                } 
                                $retval[$k][$key] = $val;
                                $retval[$k]['status'] = $content;
                            } else {
                                $retval[$k][$key] = $val;
                            }
                        }
                    }
                }
            }
            return array_values($retval);
        }

        return false;
    }

    /**
     * 获得全部进程列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @param int $id 进程的PID
     * @return bool
    */
    public static function process_delete($id='') {
        if (empty($id)) { return false;}
        if (!is_numeric($id)) { return false;}

        $retval = [];
        exec('kill -s 9 '.$id, $retval, $status);
        if ($status == 0) {
            return true;
        }
        return false;
    }

    

    /*************************************** 助手函数 ****************************************/
    
    /**
     * 判断是否Linux环境
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return bool
    */
    public static function OS(){
        return DIRECTORY_SEPARATOR == '/' ? true : false;
    }

    /**
     * 格试化内存显示单位
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @param array $mem 内存数组
     * @return array 
    */
    private static function formatmem($mem){
        if(!is_array($mem))return $mem;
        $tmp = [
            'memTotal','memUsed', 'memFree', 'memPercent',
            'memCached','memRealPercent',
            'swapTotal','swapUsed', 'swapFree', 'swapPercent'
        ];
        foreach($mem as $k=>$v) {
            if(!strpos($k,'Percent')){
                $v= $v<1024?$v.' M':$v.' G';
            }
            $mem[$k] =$v;
        }
        foreach($tmp as $v) {
            $mem[$v] =$mem[$v]?$mem[$v]:0;
        }
        return $mem;
    }

    /**
     * 内存单位转换
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @param int $size 内存数
     * @return int
    */
    public static function formatsize($size) {
        $danwei  = [' B ',' K ',' M ',' G ',' T '];
        $allsize = [];
        $i       = 0;
        for($i= 0; $i <5; $i++) {
            if(floor($size/pow(1024,$i))==0){break;}
        }
        for($l= $i-1;$l >=0; $l--) {
            $allsize1[$l]=floor($size/pow(1024,$l));
            if (!empty($allsize1[$l+1])) {
                $allsize[$l]=$allsize1[$l]-$allsize1[$l+1]*1024;
            }
        }
        $len=count($allsize);
        $fsize = [];
        for($j= $len-1;$j >=0; $j--) {
            $fsize[] = $allsize[$j]; // .$danwei[$j]; // 这个是后缀，用来识别的，做监控，一般只取 
        }  

        return array_reverse($fsize);
    }

    /**
     * 检测PHP设置参数
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $varName
     * @return string
    */
    public static function show($varName) {
        switch($result= get_cfg_var($varName)){
            case 0:
                return'<font color="red">×</font>';
            break;
            case 1:
                return'<font color="green">√</font>';
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
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $funName
     * @param int $j
     * @return string
    */
    public static function isfun($funName='',$j=0) {
        if(!$funName || trim($funName) =='' || preg_match('~[^a-z0-9\_]+~i',$funName, $tmp)) return'错误';
        if(!$j){
            return(function_exists($funName) !== false) ?'<font color="green">√</font>' : '<font color="red">×</font>';
        }else{
            return(function_exists($funName) !== false) ?'√' : '×';
        }
    }

    /**
     * 检测GD库是否支持
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @param string $
     * @param mixed $
     * @return void
    */
    public static function GetGDVer() {
        $strgd= '<font color="red">×</font>';
        if(function_exists('gd_info')) {
            $gd_info= @gd_info();
            $strgd= $gd_info["GD Version"];
        }
        return $strgd;
    }
}