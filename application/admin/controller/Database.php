<?php
// +----------------------------------------------------------------------
// | 数据库 - 服务器管理
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
use think\Config;
use org\Baksql;

class Database extends Backend{
    private $DB;

    /**
     * 初始化数据库连接
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->DB = new Baksql(Config::get('database'));
    }
    
    /**
     * 表列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        # 获取所有表名
        $tables = $this->DB->get_dbname();
        $data   = [];

        # 执行其余查询
        foreach ($tables as $k=>$v) {
            # 表名
            $data[$k]['table'] = $v;
            # 表结构
            $res = Db::query("SHOW CREATE TABLE `{$v}`");
            $res = explode("COMMENT='", $res[0]['Create Table']);
            # 表注释
            $data[$k]['remark'] = str_replace("'",'',$res[1]);
            # 表编码
            $res = explode('CHARSET=', $res[0]);
            $data[$k]['code'] = str_replace(' ','',$res[1]);
            # 总记录数
            $res = Db::query("SELECT COUNT(1) ROWS FROM `{$v}`");
            $data[$k]['count'] = $res[0]['ROWS'];
        }

        $this->assign('tables', $data);
        return $this->fetch();
    }

    /**
     * 查看数据表详情
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details() {
        $table = Request::instance()->param('id');
        $data  = [];
        # 表名
        $data['table'] = $table;
        # 表结构
        $res = Db::query("SHOW CREATE TABLE `{$table}`");
        $res = explode("COMMENT='", $res[0]['Create Table']);
        # 表注释
        $data['remark'] = str_replace("'",'',$res[1]);
        # 表编码
        $res = explode('CHARSET=', $res[0]);
        $data['code'] = str_replace(' ','',$res[1]);
        # 总记录数
        $res = Db::query("SELECT COUNT(1) ROWS FROM `{$table}`");
        $data['count'] = $res[0]['ROWS'];
        $this->assign('data', $data);

        # 获得字段详情
        $res = Db::query("SHOW FULL COLUMNS FROM `{$table}`");
        $this->assign('list', $res);

        return $this->fetch();
    }

    /**
     * 服务器详情
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function server() {
        $start = disk_total_space('/');
        $end   = disk_free_space('/');

        $data = [];
        $data['thinkphp']    = THINK_VERSION;           // ThinkPHP框架版本
        $data['php_edition'] = PHP_VERSION;             // PHP版本
        $data['mysql']       = get_mysql_server();      // Mysql版本
        $data['php_model']   = php_sapi_name();         // PHP运行内核
        $data['ip']          = $_SERVER['SERVER_NAME']; // 本机IP
        $data['root_path']   = ROOT_PATH;               // 项目根目录
        $data['nginx']       = $_SERVER['SERVER_SOFTWARE']; // 服务器环境
        $data['https']       = $_SERVER['SERVER_PROTOCOL']; // HTTP协议类型
        $data['root_statr_size'] = formatBytes($start);     // 根目录磁盘总大小
        $data['root_end_size']   = formatBytes($start-$end);// 已使用磁盘大小
        $this->assign('data', $data);

        $status = \org\Cpu::OS();
        $this->assign('status', $status);

        $data = \org\Cpu::get_linux();
        $this->assign('cpu', $data);

        $data = \org\Cpu::get_disk();
        $this->assign('disk', $data);

        $data = \org\Cpu::get_phpexts();
        $this->assign('phpexts', $data);
        
        $data = \org\Cpu::get_deletefuns();
        $this->assign('funs', $data);

        return $this->fetch();
    }

    /**
     * 流量图表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function flow() {
        if (!Request::instance()->isAjax()) {
            return $this->fetch();
        }

        $data = \org\Cpu::get_work();
        $array = [];
        // 先取出网卡详情
        foreach ($data['NetWorkName'] as $k=>$v) {
            if (!empty($data['OutSpeed'][$k][4])) {
                $title = 'TB';
                $c_flow = $data['OutSpeed'][$k][4].'.'.$data['OutSpeed'][$k][3];
                $r_flow = $data['InputSpeed'][$k][4].'.'.$data['InputSpeed'][$k][3];
            } else if (!empty($data['OutSpeed'][$k][3])) {
                $title = 'GB';
                $c_flow = $data['OutSpeed'][$k][3].'.'.$data['OutSpeed'][$k][2];
                $r_flow = $data['InputSpeed'][$k][3].'.'.$data['InputSpeed'][$k][2];
            } else if (!empty($data['OutSpeed'][$k][2])) {
                $title = 'MB';
                $c_flow = $data['OutSpeed'][$k][2].'.'.$data['OutSpeed'][$k][2];
                $r_flow = $data['InputSpeed'][$k][2].'.'.$data['InputSpeed'][$k][2];
            } else if (!empty($data['OutSpeed'][$k][1])) {
                $title = 'KB';
                $c_flow = $data['OutSpeed'][$k][1].'.'.$data['OutSpeed'][$k][0];
                $r_flow = $data['InputSpeed'][$k][1].'.'.$data['InputSpeed'][$k][0];
            } 

            $array[$v] = [
                'time' => date('H:i:s', time()),
                'c_flow' => $c_flow,
                'r_flow' => $r_flow,
                'title'  => $title,
            ];
        } 
        echo json_encode($array);exit;
    }

    /**
     * 进程管理列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function process() {
        if (DS != '/') {
            die('<h3>Windows环境下，不支持进程管理功能！</h3>');
        }
        $list = \org\Cpu::get_process();
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 强制杀死进程
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function process_delete() {
        $id  = Request::instance()->param('id');
        $res = \org\Cpu::process_delete($id);
        if ($res) {
            $this->addLog(46, 'PID: '.$id.' 强制杀死进程，成功', 1, false);
            $this->json('00', '杀死成功', $id);
        }

        $this->addLog(46, 'PID: '.$id.' 强制杀死进程，成功', 1, false);
        $this->json('01', '杀死失败');
    }
}
