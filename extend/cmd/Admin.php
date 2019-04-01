<?php
// +----------------------------------------------------------------------
// | CMD命令 - admin命令
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

class Admin extends Common{
    /**
     * 命令行参数
    */
    private static $_param = [];
    
    /**
     * 用于admin命令行分流
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
            case 'login': self:: login(); break;
            case 'exit' : self:: exits(); break;
            case 'lg'   : self:: login_log(); break;
            case 'la'   : self:: action_log(); break;
            case 'add'  : self:: add(); break;
            case 'pwd'  : self:: pwd(); break;
            case '-s'   : self:: del(); break;
            default: self:: json('02', 'admin分支下，暂不支持该命令');
        }
    }

    /**
     * 登录
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function login() {
        $session = Session::get('cmd_admin');
        if (Session::get('cmd_admin')) self::json('02', '当前账号为【'.$session['ca_name'].'】，请使用 exit 命令退出后，重新登录');
        if (empty(self::$_param[2])) self::json('02', '请输入CMD账号');
        if (empty(self::$_param[3])) self::json('02', '请输入密码');

        $where = [
            'ca_name' => ['=', self::$_param[2]],
            'ca_status' => 1,
        ];
        $info = Db::name('cmd_admin')->where($where)->find();
        if (!$info || (md5(self::$_param[3].$info['ca_add_time']) != $info['ca_pwd']) ) self::json('02', '账号或密码错误');
        
        # 记录登录日志
        $request = Request::instance();
        $ip      = $request->ip();
        $data    = isTaobao($ip);
		$data    = [
			'ca_id'   => $info['ca_id'],
			'cal_ip'   => $ip,
            'cal_province' => $data['region'] ?: '无',
            'cal_city' => $data['city'] ?: '无',
            'cal_area' => $data['county'] ?: '无',
			'cal_time' => time(),
		];
        $res = Db::name('cmd_admin_login_log')->insert($data);
        if ($res) {
            Session::set('cmd_admin', $info);
            self::json('02', '登录成功');
        } 
        self::json('02', '登录失败：写入登录log异常');
    }

    /**
     * 退出登录
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function exits() {
        Session::delete('cmd_admin');
        self::json('02', '退出成功');
    }

    /**
     * 查看登录log
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function login_log() {
        # lg命令可能会存以下形式
        # admin lg   读取当前账号下，前10条登录记录
        # admin lg 5 同上，只读5条
        # admin lg -i 读取当前账号下，只显示 ip 与 登录时间，前10条登录记录
        # admin lg -i 5 同上，只读5条
        # admin lg admin 读取admin账号下，前10条登录记录
        # admin lg admin 5 同上，只读5条
        # admin lg admin -i 5 同上，只显示 ip 与 登录时间，只读前5条

        $admin = Session::get('cmd_admin');
        $field = 'cal_ip,cal_time,cal_province,cal_city,cal_area';
        $status= true;
        $limit = 10;
        $where = [
            'ca_id' => ['=', $admin['ca_id']]
        ];
        
        if (!empty(self::$_param[2]) && self::$_param[2] == '-i') {
            $status= false;
            $field = 'cal_ip,cal_time';
            if (!empty(self::$_param[3]) && floor(self::$_param[3])) {
                $limit = self::$_param[3];
            }
        # 纯数字
        } else if (!empty(self::$_param[2]) && floor(self::$_param[2])){
            $limit = self::$_param[2];
        } else if (!empty(self::$_param[2])) {
            if ($admin['ca_name'] != 'admin' && self::$_param[2] == 'admin') {
                self::json('02', '您不能查看admin超级账号的登录记录');
            }
            # 其他查询账号下的记录
            $ca_id = Db::name('cmd_admin')->where('ca_name',self::$_param[2])->value('ca_id');
            if (!$ca_id) self::json('02', self::$_param[2].' 账号不存在');
            $where['ca_id'] = ['=', $ca_id];
            if (!empty(self::$_param[3]) && self::$_param[3] == '-i') {
                $status= false;
                $field = 'cal_ip,cal_time';
            } else if (!empty(self::$_param[3]) && floor(self::$_param[3])){
                $limit = self::$_param[3];
            }
            if (!empty(self::$_param[4]) && floor(self::$_param[4])) {
                $limit = self::$_param[4];
            }
        }

        $list = Db::name('cmd_admin_login_log')->where($where)->order('cal_id DESC')->field($field)->limit($limit)->select();
        $data = [];
        if ($status) {
            $data[] = ['<div class="w150">IP</div><div class="w150">时间</div><div class="w150">省市区</div>'];
        } else {
            $data[] = ['<div class="w150">IP</div><div class="w150">时间</div>'];
        }
        
        foreach ($list as $v) {
            $str = '<div class="w150">'.$v['cal_ip'].'</div><div class="w150">'.date('Y-m-d H:i:s', $v['cal_time']).'</div>';
            if ($status) {
                $str .= '<div class="w150">'.$v['cal_province'].$v['cal_city'].$v['cal_area'].'</div>';
            }
            $data[] = $str;
        }
        self::json('00', '处理成功', $data);
    }

    /**
     * 查看命令行输入log
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function action_log() {
        # lg命令可能会存以下形式
        # admin la   读取当前账号下，前10条登录记录
        # admin la 5 同上，只读5条
        # admin la -i 读取当前账号下，只显示命令行，前10条登录记录
        # admin la -i 5 同上，只读5条
        # admin la admin 读取admin账号下，前10条登录记录
        # admin la admin 5 同上，只读5条
        # admin la admin -i 5 同上，只显示命令行，只读前5条

        $admin = Session::get('cmd_admin');
        $field = 'caa_ip,caa_content,caa_time';
        $status= true;
        $limit = 10;
        $where = [
            'ca_id' => ['=', $admin['ca_id']]
        ];
        
        if (!empty(self::$_param[2]) && self::$_param[2] == '-i') {
            $status= false;
            $field = 'caa_content';
            if (!empty(self::$_param[3]) && floor(self::$_param[3])) {
                $limit = self::$_param[3];
            }
        # 纯数字
        } else if (!empty(self::$_param[2]) && floor(self::$_param[2])){
            $limit = self::$_param[2];
        } else if (!empty(self::$_param[2])) {
            if ($admin['ca_name'] != 'admin' && self::$_param[2] == 'admin') {
                self::json('02', '您不能查看admin超级账号的历史记录');
            }
            # 其他查询账号下的记录
            $ca_id = Db::name('cmd_admin')->where('ca_name',self::$_param[2])->value('ca_id');
            if (!$ca_id) self::json('02', self::$_param[2].' 账号不存在');
            $where['ca_id'] = ['=', $ca_id];
            if (!empty(self::$_param[3]) && self::$_param[3] == '-i') {
                $status= false;
                $field = 'caa_content';
            } else if (!empty(self::$_param[3]) && floor(self::$_param[3])){
                $limit = self::$_param[3];
            }
            if (!empty(self::$_param[4]) && floor(self::$_param[4])) {
                $limit = self::$_param[4];
            }
        }

        $list = Db::name('cmd_admin_action_log')->where($where)->order('caa_id DESC')->field($field)->limit($limit+1)->select();
        $data = [];
        if ($status) {
            $data[] = ['<div class="w150">IP</div><div class="w150">时间</div><div class="w150">命令</div>'];
        } else {
            $data[] = ['<div class="w750">命令</div>'];
        }
        
        foreach ($list as $k=>$v) {
            if ($k == 0) {continue;}
            if ($status) {
                $data[] = [ '<div class="w150">'.$v['caa_ip'].'</div><div class="w150">'.date('Y-m-d H:i:s', $v['caa_time']).'</div>'. '<div class="w550">'.$v['caa_content'].'</div>' ];
            } else {
                $data[] = [ '<div class="w550">'.$v['caa_content'].'</div>' ];
            }
        }
        self::json('00', '处理成功', $data);
    }

    /**
     * 创建新账号
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function add() {
        # add命令可能会存以下形式
        # admin add 用户名 密码 昵称[null]
        $session = Session::get('cmd_admin');
        if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许创建新账号');
        if (empty(self::$_param[2])) self::json('02', '请输入账号');
        if (empty(self::$_param[3])) self::json('02', '请输入密码');

        //英文、数字、下划线6-15位字符
        $preg='/^[a-za-z]{1}([a-za-z0-9]|[._]){4,15}$/';
        if (!preg_match($preg, self::$_param[2])) self::json('02', '账号格式错误：英文与数字组合、4-15位字符');

        $info = Db::name('cmd_admin')->where('ca_name', self::$_param[2])->find();
        if ($info) self::json('02', 'CMD账号已存在，请修改');
        
        $time = time();
		$data = [
            'ca_nick' => !empty(self::$_param[4]) ? self::$_param[4] : '',
            'ca_name' => self::$_param[2],
            'ca_pwd'  => md5(self::$_param[3].$time),
            'ca_add_time' => $time,
		];
        $res = Db::name('cmd_admin')->insert($data);
        if ($res) {
            self::json('02', 'CMD账号创建成功');
        } 
        self::json('02', 'CMD账号创建成功');
    }

    /**
     * 修改密码
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function pwd() {
        # pwd命令可能会存以下形式
        # admin pwd 密码 修改当前自己的密码
        # admin pwd 账号 密码 修改他人密码【admin专用】

        $session = Session::get('cmd_admin');
        if (empty(self::$_param[2])) self::json('02', '请输入需要修改的账号 或 密码');
        
        # 修改自己密码
        if (empty(self::$_param[3])) {
            $pwd = md5(self::$_param[2].$session['ca_add_time']);
            $res = Db::name('cmd_admin')->where('ca_id', $session['ca_id'])->data(['ca_pwd' => $pwd])->update();
        } else {
            if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许创建新账号');
            $info = Db::name('cmd_admin')->where('ca_name', self::$_param[2])->find();
            if (!$info) self::json('02', 'CMD账号不存在');
            $pwd = md5(self::$_param[3].$info['ca_add_time']);
            $res = Db::name('cmd_admin')->where('ca_id', $info['ca_id'])->data(['ca_pwd' => $pwd])->update();
        }
        if ($res) self::json('02', '密码修改成功');
        self::json('02', '密码修改失败');
    }

    /**
     * 删除账号
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private static function del() {
        # -s命令可能会存以下形式
        # admin -s 查看所有用户列表
        # admin -s 用户名    查看账号状态
        # admin -s 用户名 -y 开启账号
        # admin -s 用户名 -n 关闭账号
        # admin -s 用户名 -i 查看指定用户详情

        $session = Session::get('cmd_admin');
        if ($session['ca_name'] != 'admin') self::json('02', '只有admin账号，才允许查看账号信息');

        if (empty(self::$_param[2])) {
            $data = [];
            $data[] = ['<div class="w150">昵称</div><div class="w150">用户名</div><div class="w150">创建时间</div>'];
            $list = Db::name('cmd_admin')->select();
            foreach ($list as $v) {
                $data[] = [ '<div class="w150">'.$v['ca_nick'].'&nbsp;</div><div class="w150">'.$v['ca_name'].'</div><div class="w150">'.date('Y-m-d H:i:s', $v['ca_add_time']).'</div>' ];
            }
            self::json('00', '处理成功', $data);
        } else {
            $info = Db::name('cmd_admin')->where('ca_name', self::$_param[2])->find();
            if (!$info) self::json('02', 'CMD账号不存在');

            if (empty(self::$_param[3])) {
                $str  = self::$_param[2] . '的状态：';
                $str .= $info['ca_status'] == 1 ? '正常' : '关闭';
                self::json('02', $str);
            } else if (self::$_param[3] == '-y') {
                $res = Db::name('cmd_admin')->where('ca_id', $info['ca_id'])->data(['ca_status'=> 1])->update();
                if ($res !== false) { self::json('02', '开启成功'); } else { self::json('02', '开启失败'); }
            } else if (self::$_param[3] == '-n') {
                $res = Db::name('cmd_admin')->where('ca_id', $info['ca_id'])->data(['ca_status'=> 0])->update();
                if ($res !== false) { self::json('02', '关闭成功'); } else { self::json('02', '关闭失败'); }
            }
        }
        self::json('02', '指令错误');
    }
}