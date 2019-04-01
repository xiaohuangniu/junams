<?php
// +----------------------------------------------------------------------
// | 后台主页模块
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\common\controller\Backend;
use think\Db;
use think\Request;
use think\Cookie;

class Index extends Backend {

    /**
     * 后台主页框架
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        return $this->fetch();
    }

    /**
     * 控制台页面
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function main() {
        return $this->fetch();
    }

    /**
     * 清除全站缓存
     * @todo 清除后不可逆
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function runtime_del($dirName='') {
        if (empty($dirName)) {
            $dirName = ROOT_PATH.'runtime'.DS;
            $this->addLog(36, '清除全站缓存', 1, false);
        }

        if ( $handle = opendir( "$dirName" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dirName/$item" ) ) {
                        $this->runtime_del("$dirName/$item" );
                    } else {
                        unlink( "$dirName/$item" );   
                    }   
                }   
            }
            closedir( $handle );
        }
    }

    /**
     * BOM头检测与清除
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function bomhead() {
        $type = Request::instance()->param('type');
        $obj  = new \org\Bom();

        # 只检测
        if ($type == 1) {
            $res = $obj->run(false);
            if ($res != '') {
                $this->json('00', '检测成功，存在BOM头文件', $res);
            }
            $this->json('00', '检测成功，暂无存在BOM头文件');
        # 清除
        } else if ($type == 2) {
            $this->addLog(45, '清除文件BOM头', 1, false);
            $res = $obj->run(true);
            $this->json('00', 'BOM头文件清除成功');
        }
        $this->json('01', '暂不处理该类请求！');
    }

    
    /**
     * 定时检测流量情况
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function warning_flow() {
        // 获取数据库配置
        $info = Db::name('config')->field('warning_email,warning_value,warning_type,warning_num')->where('id=1')->find();
        $data = \org\Cpu::get_work();

        // 先取出网卡详情
        foreach ($data['NetWorkName'] as $k=>$v) {
            // lo 回环网卡跳过
            if ($v == 'lo') { continue; }
            $flow = 0;
            $status = 1;

            // TB
            if ($info['warning_type'] == 4) {
                $title = 'TB';
                $flow = $data['OutSpeed'][$k][4].'.'.$data['OutSpeed'][$k][3];
            // GB 往上拿
            } else if ($info['warning_type'] == 3) {
                $title = 'GB';
                if (!empty($data['OutSpeed'][$k][4])) {
                    $status = 1024;
                    $flow = $data['OutSpeed'][$k][4].'.'.$data['OutSpeed'][$k][3];
                } else {
                    $flow = $data['OutSpeed'][$k][3].'.'.$data['OutSpeed'][$k][2];
                }
            // MB 往上拿
            } else if ($info['warning_type'] == 2) {
                $title = 'MB';
                if (!empty($data['OutSpeed'][$k][3])) {
                    $status = 1024;
                    $flow = $data['OutSpeed'][$k][3].'.'.$data['OutSpeed'][$k][2];
                } else {
                    $flow = $data['OutSpeed'][$k][2].'.'.$data['OutSpeed'][$k][1];
                }
            // KB 往上拿
            } else if ($info['warning_type'] == 1) {
                $title = 'KB';
                if (!empty($data['OutSpeed'][$k][2])) {
                    $status = 1024;
                    $flow = $data['OutSpeed'][$k][2].'.'.$data['OutSpeed'][$k][1];
                } else {
                    $flow = $data['OutSpeed'][$k][1].'.'.$data['OutSpeed'][$k][0];
                }
            }

            //保存个时间，防止中途断网
            $f_time = $v.'_time';
            $time   = Cookie::get($f_time);
            $data   = time();
            Cookie::set($f_time, $data);

            //定时超标次数键名
            $field = $v.'_num';
            //读取
            $num = Cookie::get($field);
            if ($num == null) {
                $num = 0;
                Cookie::set($field, 0);
            }

            // 取出上一个设置的cookie
            $cookie = Cookie::get($v);
            // 什么都不管，先更新cookie的值
            Cookie::set($v, $flow);
            // 第一次检测只做初始化处理
            if ($cookie <= 0 ) { continue; }
            // 计算相差时间 大于5秒表示中途离开了
            if (($data - $time) > 5) { continue; }

            // 判断今次流量与上次流量的增幅
            $count = ($flow - $cookie) * $status;
            // 检测超量检测
            if ($count > $info['warning_value']) {
                // 判断超量次数是否一致
                if ( ($num+1) > $info['warning_num']) {
                    $content = '警告！警告！当前流量已超每秒 【'.$info['warning_value'].$title.'】 警戒线！！！';
                    // 超了发邮件
                    if (!empty($info['warning_email'])) {
                        \email\Email::run($info['warning_email'], 'JunCms 流量超标警报！！！', "时间：".date('Y-m-d H:i:s')."\r\n".$content);
                    }
                    echo json_encode([
                        'code' => '01',
                        'msg'  => $content
                    ]);exit;
                // 还没超就+1
                } else {
                    Cookie::set($field, ($num+1));
                }
            }
        } 
    }
}