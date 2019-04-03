<?php
// +----------------------------------------------------------------------
// | 后台登录模块
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
use think\Cookie;

class Login extends Backend{

    /**
     * 登录界面
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        # 如果已经登录则自动跳转到主页
        if (Session::get('admin') || Cookie::get('login_auto')) {
            $this->redirect('index/index');
            exit;
        }

        $num  = Session::get('login_num');
        if (Request::instance()->isAjax() == false) {
            $this->view->engine->layout(false); 
            $this->assign('num', $num);
            return $this->fetch();
        }
        
        $user = Request::instance()->post('user');
        $pwd  = Request::instance()->post('pwd');
        $vif  = Request::instance()->post('vif');
        $status = Request::instance()->post('status');
        Session::set('login_num', $num+1);

        if ($num >= 2) {
            # 验证码核验
            if (!captcha_check($vif)) {
                $this->json('01', '验证码错误', $num);
            }
        }
        
        if (empty($user) || empty($pwd)) $this->json('01', '用户名或密码错误', $num);
        
        $res  = Db::name('manager')
                ->alias('A')
                ->field('A.*, B.s_name, C.j_name')
                ->join('__STRUCTURE__ B', 'A.m_structure = B.s_id','LEFT')
                ->join('__JOB__ C', 'A.m_job = C.j_id','LEFT')
                ->where('A.m_user', $user)
                ->find();
        
        if (!$res) $this->json('01', '用户名或密码错误', $num);
        if (md5($pwd . $res['m_time']) != $res['m_pwd']) $this->json('01', '用户名或密码错误', $num);
        # 记住登录状态
        Session::set('admin', $res);
        Session::set('login_num', 0);
        # 七天自动登录
        if ($status == 1) {
            $ip   = Request::instance()->ip();  // IP设备绑定
            $time = time() + (86400 * 7);       // 过期时间
            $rand = mt_rand(100000, 999999); // 随机安全码
            # 使用密码本加密用户名，使用SHA1加密签名串
            $sha1 = \org\Encryption::run($user).'|'.sha1($rand.$time.$ip);
            # 七天登录
            Cookie::set('login_auto', $sha1, (86400 * 7));
            # 把三要素写入管理员表
            Db::name('manager')->where('m_user', $user)->update([
                'm_auto_time' => $time,
                'm_auto_rand' => $rand,
                'm_auto_ip'   => $ip,
            ]);
        }
        # 写入日志
        $this->add_login_log($res['m_id']);
        $this->json('00', '登录成功');
    }

    /**
     * 退出登录(公共)
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	public function out(){
        // 清除七天登录状态
        Db::name('manager')->where('m_id', $this->admin['m_id'])->update([
            'm_auto_time' => '',
            'm_auto_rand' => '',
            'm_auto_ip'   => '',
        ]);
		Session::delete('admin');
		$this->redirect('login/index');
	}

    /**
     * 添加日志记录(公共)
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.19
     * @deprecated 暂不弃用
     * @global 无
     * @param int $id 管理员ID
     * @return void
    */
	private function add_login_log($id){
		$request = Request::instance();
        $ip      = $request->ip();
        $data    = \org\Ipcity::run($ip);
		$data    = [
			'm_id'   => $id,
			'l_ip'   => $ip,
            'l_province' => $data['province'] ?: '无',
            'l_city' => $data['city'] ?: '无',
            'l_area' => $data['area'] ?: '无',
			'l_time' => time(),
		];
		Db::name('manager_login_log')->insert($data);
    }
}