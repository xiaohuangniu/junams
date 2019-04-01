<?php
// +----------------------------------------------------------------------
// | 后台控制器基类
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace app\common\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cookie;
use think\Db;

class Backend extends Controller {
    /**
     * 管理员登录参数
    */
    protected $admin;

    /**
     * 登录状态记录
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不启用
     * @global 无
     * @return void
    */
    public function _initialize() {
        parent::_initialize();
        header('Content-Type:text/html;charset:utf-8');
        $Request = Request::instance();
        # 封锁IP
        $ip = $Request->ip();
        $list = Db::name('black_ip')->field('bi_ip')->where('bi_status',1)->order('bi_time DESC')->select();
        foreach ($list as $v) {
            if ($v['bi_ip'] == $ip) {
                $content = file_get_contents(APP_PATH.'common'.DS.'view'.DS.'tpl'.DS.'ip_end.html');
                die($content);
            }
        }
        
        # 获得控制器方法
        $app        = strtolower( $Request->module() );
		$controller = strtolower( $Request->controller() );
        $action     = strtolower( $Request->action() );
        if ($app == 'admin' && $controller == 'login' && ($action == 'index' || $action == 'add_login_log')) {
            return true;
        }

        # 登录验证
        $this->login_auto();
        
        # 设置公共权限
        $array = [
            ['m_app' => 'admin', 'm_controller' => 'index', 'm_action' => 'index'],
            ['m_app' => 'admin', 'm_controller' => 'index', 'm_action' => 'main'],
            ['m_app' => 'admin', 'm_controller' => 'menu',  'm_action' => 'icon'],
            ['m_app' => 'admin', 'm_controller' => 'login',  'm_action' => 'out'],
        ];

        # 获取列表
        # 超级管理员
        if ($this->admin['m_type'] == 1) {
            # 获取列表
            $menu = $this->get_menu();
        }else{
            # 获取列表
            $menu = $this->get_menu($this->admin['m_structure'], $this->admin['m_job']);
        }

        # 将权限菜单传送到页面
		$this->assign('admin_menu', menuFor($menu));

        # 合并公共权限到菜单中-不过只作为验证
		$menu_vif = array_merge_recursive($menu, $array);
		$this->menu_vif = $menu_vif;
        
        # 验证访问权限
		$this->vif_menu($menu_vif);

		# 将控制器实例返回
		$this->assign('adminController', $this);
    }

    /**
     * 七天自动登录
     * @todo 无
     * @author 小黄牛
     * @version v1.1.3 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    private function login_auto() {
        $admin = Session::get('admin');

        # 获得七天登录加密串
        $pod = Cookie::get('login_auto');
        # 判断是否已经登录，未登录做七天登录验证
		if (empty($admin) && $pod) {
            $array = explode('|', $pod);
            # 获得用户名
            $user  = \org\Encryption::decrypt($array[0]);
            # 获得加密签名
            $sha1  = !empty($array[1]) ? $array[1] : '';
            # 查询管理员数据
            $info  = Db::name('manager')
                ->alias('A')
                ->field('A.*, B.s_name, C.j_name')
                ->join('__STRUCTURE__ B', 'A.m_structure = B.s_id','LEFT')
                ->join('__JOB__ C', 'A.m_job = C.j_id','LEFT')
                ->where('A.m_user', $user)
                ->find();
            if ($info) {
                # 生成签名
                $sign   = sha1($info['m_auto_rand'].$info['m_auto_time'].$info['m_auto_ip']);
                # 允许登录状态
                $status = true;
                # 七天超时
                if ($info['m_auto_time'] < time()) { $status = false; }
                # ip不一致
                if ($info['m_auto_ip'] != Request::instance()->ip()) { $status = false; }
                # 签名不一致
                if (empty($sha1) || $sign != $sha1) { $status = false; }
                # 不成功则清除七天绑定
                if (!$status) {
                    Cookie::set('login_auto', '');
                    Db::name('manager')->where('m_user', $user)->update([
                        'm_auto_time' => '',
                        'm_auto_rand' => '',
                        'm_auto_ip'   => '',
                    ]);
                } else {
                    $admin = $info;
                }
            }
        }
        
        # 登录信息绑定
        $this->admin = $admin;
        $this->assign('admin_data', $admin);
        
        if (!$admin) {
            # 跳转到登录页
            $this->redirect('login/index');
        }
    }

    /**
     * 获取对应的权限菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.28
     * @deprecated 暂不启用
     * @global 无
     * @param int $structure 部门ID
     * @param int $job       岗位ID
     * @return array 菜单
	*/
    protected function get_menu($structure=0, $job=0){
        # 超级管理员
        if ($structure == 0) {
            $list = Db::name('menu')->where('m_status = 1')->order('m_id ASC')->field('m_id as id, m_pid as pid,m_name,m_app,m_controller,m_action,m_icon,m_display')->select();
        }else{
            # 搜出部门对于的公共角色
            $s_role = Db::name('structure')->where('s_id', $structure)->field('r_id, s_name')->find();
            # 搜出岗位对应的私有角色
            $j_role = Db::name('job')->where('j_id', $job)->field('r_id, j_name')->find();

            # 使用角色ID搜索出现有的角色, 过滤已被禁用的角色
            $where = [];
            $where['r_id'] = ['in', $j_role['r_id'].','.$s_role['r_id']];
            $where['r_status'] = ['=', 1];
            $where['r_menu_list'] = ['neq', ''];
            $role = Db::name('role')->where($where)->field('r_status, r_menu_list')->select();

            # 过滤重复的角色权限菜单ID
            $menu = [];
            foreach ($role as $v) {
                $k = explode(',', $v['r_menu_list']);
                foreach ($k as $z) {
                    $menu[$z] = $z;
                }
            }
            $menu = implode(',', $menu);

            # 使用菜单ID查询出对应的菜单
            $list = Db::name('menu')->where("m_status = 1 AND m_id in({$menu})")->order('m_id ASC')->field('m_id as id, m_pid as pid,m_name,m_app,m_controller,m_action,m_icon,m_display')->select();
        }
        return $list;
    }

    /**
	  * 验证访问权限
      * @todo 无
      * @author 小黄牛
      * @version v1.0.0.1 + 2018.9.28
      * @deprecated 暂不启用
      * @global 无
	  * @param array $menu 权限菜单
	  * @return 无
	*/
	private function vif_menu($menu){
		# 获得控制器方法
		$Request    = Request::instance();
        $app        = strtolower( $Request->module() );
		$controller = strtolower( $Request->controller() );
		$action     = strtolower( $Request->action() );
		$status     = false;
		# 验证菜单权限
		foreach ($menu as $v) {
			if ($v['m_app'] == $app &&  $v['m_controller'] == $controller && $v['m_action'] == $action) {
				$status = true;
                break;
				# 里面预留，做为验证请求类型的判断
			}
		}

		$this->assign('controller', $controller);
		$this->assign('action', $action);

		if (!$status) $this->error('无该页面的访问权限！');
	}

    /**
	 * 单独验证菜单权限
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.28
     * @deprecated 暂不启用
     * @global 无
	 * @param string $controller 控制器
	 * @param string $action     操作方法
     * @param string $app        入口模块，默认为admin
	 * @return bool
	*/
	public function vif($controller, $action, $app='admin'){
		$controller = strtolower( $controller );
		$action     = strtolower( $action );
        $app        = strtolower( $app );
		$status     = false;

		# 验证
		foreach ($this->menu_vif as $v) {
			if ($v['m_app'] == $app && $v['m_controller'] == $controller && $v['m_action'] == $action) {
				$status = true;
				break;
			}
		}
		return $status;
	}

    /**
	 * 验证是否拥有地区访问权限
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.28
     * @deprecated 暂不启用
     * @global 无
	 * @param int $id 地区ID
	 * @return bool
	*/
	public function regionVif($id = ''){
		if (empty($id)) return true;
		$admin = Session::get('admin');
		# 拥有全国权限 
		if ($admin['m_nationwide'] == 1) return true;
		# 判断是否拥有权限
		$data = explode(',', $admin['m_province'].$admin['m_city'].$admin['m_area']);
		if (in_array($id, $data)) return true;
		return false;
	}

    /**
	 * 拉取地区访问权限
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.28
     * @deprecated 暂不启用
     * @global 无
	 * @return bool|string
	*/
	public function regionGet(){
		$admin = Session::get('admin');
		# 拥有全国权限 
		if ($admin['m_nationwide'] == 1) return true;
		return [
			'province' => ltrim($admin['m_province'], ','),
			'city'     => ltrim($admin['m_city'], ','),
			'area'     => ltrim($admin['m_area'], ','),
		];
	}

    /**
	 * 记录操作日志
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不启用
     * @global 无
	 * @param int    $type   操作类型
	 * @param string $title  详细描述
	 * @param int    $status 操作状态 1|2|3 成功|失败|异常
	 * @param bool   $model  是否需要重定向回上一页
	 * @return 无
	*/
	protected function addLog($type, $title, $status, $model=true){
		$request = Request::instance();
		$data    = [
			'm_id'       => $this->admin['m_id'],
			'mal_type'   => $type,
			'mal_des'    => $title,
			'mal_status' => $status,
			'mal_time'   => time(),
			'mal_ip'     => $request->ip(),
			'mal_url'    => $request->url(),
			'mal_mode'   => $request->method(),
		];
		Db::name('manager_action_log')->insert($data);
		if ($model) {
            if ($status == 1) {
                $this->success($title);
            } else {
                $this->error($title);
            }
        }
	}

	/**
     * 日志类型表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.28
     * @deprecated 暂不启用
     * @global 无
     * @return  array
    */
    protected function Log_Type(){
        return [
            1 => '后台操作日志',
            2 => '前端操作日志',
        ];
    }
    
    /**
     * 输出前端JSON接口结构
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.8.23
     * @deprecated 暂不启用
     * @global 无
     * @param strting $code 状态码 00|01 成功|失败
     * @param string $msg 接口描述
     * @param mixed $data 接口返回值
     * @return void
    */
    public function json($code='00', $msg='成功', $data='') {
        echo json_encode([
            'code' => "{$code}",
            'msg'  => "{$msg}",
            'data' => $data,
        ], JSON_UNESCAPED_UNICODE);exit;
    }

    /**
     * 车辆使用性质
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不启用
     * @global 无
     * @return array
    */
    protected function Car_Nature() {
        return [
            1 => '家庭自用',
            2 => '非营运企业',
            3 => '非营业机关',
            4 => '非营业货运',
            5 => '非营业特种车',
            6 => '营业出租租赁',
            7 => '营业城市公交',
            8 => '营业公路客运',
            9 => '营业特种车',
            10 => '营业旅游',
            11 => '营业货运',
        ];
    }
}
