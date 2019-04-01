<?php
// +----------------------------------------------------------------------
// | CMD工具
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
use think\Session;

class Cmd extends Backend{
    //protected $DB; // 岗位表

    /**
     * 初始化定义数据模型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
		parent::_initialize();  
        //$this->DB = Db::name('job');
    }

    /**
     * 命令行页面
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        # 显示页面
        if (!Request::instance()->isAjax()) {
            return $this->fetch();
        }
        # 处理逻辑
        $this->run();
    }

    /**
     * 指令分流操作
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.9 + 2018.11.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function run() {
        # 文件修改操作
        if (!empty(Request::instance()->param('type'))) {
            \cmd\Vim::run(true, Request::instance()->param());
        }

        # 命令行操作
        $param   = strtolower($this->sphtmltext(Request::instance()->param('cmd')));
        $session = Session::get('cmd_admin');
        $explode = $this->param_explode($param, $session);
        $Cmd     = $explode[0];

        # 只有登录指令，不需要验证登录
        if ($Cmd == 'admin' && $explode[1] == 'login') {
        } else {
            # 先判断有没有登录
            if (empty($session['ca_id'])) {
                $this->json('01', '请先登录');
            }
        }

        # 有登录的，则记录操作日志
        if (!empty($session)) {
            $data = [
                'ca_id' => $session['ca_id'],
                'caa_time' => time(),
                'caa_content' => $param,
                'caa_ip' => Request::instance()->ip(),
            ];
            Db('cmd_admin_action_log')->insert($data);
        }
        
        # 登录后开始分流指令
        switch ($Cmd) {
            case 'admin' : \cmd\Admin::run($explode); break; // 工具账号命令
            case 'php'   : \cmd\Php::run($explode); break;   // PHP部署命令
            case 'cd'    : \cmd\Cd::run($explode); break;    // 切换目录命令
            case 'ls'    : \cmd\Ls::run($explode); break;    // 查看目录结构命令
            case 'mk'    : \cmd\Mk::run($explode); break;    // 目录操作命令
            case 'tk'    : \cmd\Tk::run($explode); break;    // 文件操作命令
            case 'vim'   : \cmd\Vim::run($explode); break;   // 文件编辑命令
            default : $this->json('02', '暂不支持该命令');
        }
    }

    /**
     * 命令行分解
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @param string $txt 指令
     * @return array
    */
    private function param_explode($txt='admin   login   admin   admin', $seesion) {
        $txt = str_replace(' command line： ','', rtrim($txt));
        if (empty($txt) && empty($seesion)) {
            $this->json('01', '请先登录-2');
        } else if (empty($txt)) {
            $this->json('02', '请输入命令行');
        }
        $array = array_merge(array_filter(explode(' ', $txt)));

        # 退出指令转发给admin处理
        if (!empty($seesion) && !empty($array[0]) && $array[0] == 'exit') {
            $array[0] = 'admin';
            $array[1] = 'exit';
        }

        # ls命令可以没有参数
        if ($array[0] != 'ls' && empty($array[1])) {
            $this->json('02', '命令行至少存在两组参数，例如：admin login 或 cd ./');
        }

        return $array;
    }

    /**
     * 删除所有html标签
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不弃用
     * @global 无
     * @param string $str 命令行
     * @return string
    */
    private function sphtmltext($str) {
        $str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","", '<div>'.$str.'</div>');
        $alltext = "";
        $start   = 0;
        for ($i=0;$i<strlen($str);$i++) {
            if ($start==0 && $str[$i]==">") {
                $start = 1;
            } else if ($start==1) {
                if ($str[$i]=="<") {
                    $start = 0;
                    $alltext .= " ";
                } else if(ord($str[$i])>31) {
                    $alltext .= $str[$i];
                }
            }
        }
        $alltext = str_replace(" "," ",$alltext);
        $alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
        $alltext = preg_replace("/[ ]+/s"," ",$alltext);
        return $alltext;
    }
}
