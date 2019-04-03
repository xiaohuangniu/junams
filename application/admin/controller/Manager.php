<?php
// +----------------------------------------------------------------------
// | 管理员管理模块
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

class Manager extends Backend{
    protected $DB;

    /**
     * 初始化定义数据模型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
		parent::_initialize();  
        $this->DB = Db::name('manager');
    }

    /**
     * 管理员列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $user      = Request::instance()->get('user');
        $phone     = Request::instance()->get('phone');
        $nice      = Request::instance()->get('nice');
        $status    = Request::instance()->get('status');
        $existence = Request::instance()->get('existence');

        $page_where = [
            'status' => $status,
            'existence' => $existence,
            'phone' => $phone,
            'user' => $user,
            'nice' => $nice,
        ];

        $_where = [];

        if (!empty($user))  $_where['A.m_user']  = ['like', "%{$user}%"];
        if (!empty($phone)) $_where['A.m_phone'] = ['like', "%{$phone}%"];
        if (!empty($nice))  $_where['A.m_nice']  = ['like', "%{$nice}%"];
        if (!empty($status))    $_where['A.m_status'] = ['=', $status];
        if (!empty($existence)) $_where['A.m_user'] = ['=', $existence];

        $list = $this->DB
                ->alias('A')
                ->field('A.*, B.s_name, C.j_name')
                ->join('__STRUCTURE__ B', 'A.m_structure = B.s_id','LEFT')
                ->join('__JOB__ C', 'A.m_job = C.j_id','LEFT')
                ->order('A.m_time desc')
                ->where($_where)
                ->paginate(15, false, [
                    'query' => $page_where
                ]);
		$page = $list->render();

		$this->assign('list', $list);
		$this->assign('page', $page);

        $this->assign('page_where', $page_where);
        return $this->fetch();
    }

    /**
     * 新增管理员
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $user      = Request::instance()->post('user');
            $pwd       = Request::instance()->post('pwd');
            $phone     = Request::instance()->post('phone');
            $nice      = Request::instance()->post('nice');
            $structure = Request::instance()->post('structure');
            $job       = Request::instance()->post('job');
            $status    = Request::instance()->post('status');
            $existence = Request::instance()->post('existence');
            $type      = Request::instance()->post('type');
            $region    = Request::instance()->post('region');
            $province  = Request::instance()->post('province');
            $city      = Request::instance()->post('city');
            $area      = Request::instance()->post('area');
            $time      = time();
            $pwd       = md5($pwd . $time);
            $region    = ($region == 1) ? 1 : $region;

            $DB     = Db::name('manager');
            if ($DB->where('m_user', $user)->value('m_id')) {
                $this->addLog(25, '用户已存在', 3, false);
                $this->json('01', '用户已存在');
            }

            if ($type == 1) {
                $count  = $DB->where('m_type', 1)->count();
                if ($count >= 3) {
                    $this->addLog(25, '最多只能同时存在 3 个超级管理员', 3, false);
                    $this->json('01', '最多只能同时存在 3 个超级管理员');
                }
            } 

            $data = [
                'm_nice'       => $nice,        // 姓名
                'm_user'       => $user,        // 用户名
                'm_pwd'        => $pwd,         // 密码
                'm_phone'      => $phone,       // 手机
                'm_time'       => $time,        // 时间
                'm_status'     => $status,      // 状态
                'm_type'       => $type,        // 超级管理员
                'm_existence'  => $existence,   // 是否已离职
                'm_nationwide' => $region,      // 全国权限
                'm_structure'  => $structure,   // 部门ID
                'm_job'        => $job,         // 岗位ID
            ];
           
            # 不是全国地区管理权限
            if ($region != 1) {
                $data['m_province'] = $province;
                $data['m_city'] = $city;
                $data['m_area'] = $area;
            }else{
                $data['m_province'] = '';
                $data['m_city'] = '';
                $data['m_area'] = '';
            }

            $res = $DB->insert($data);
            if ($res) {
                $this->addLog(25, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(25, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
            $structure = Db::name('structure')->field('s_id, s_name')->order('s_sort DESC')->select();
            $job       = Db::name('job')->field('j_id, j_name')->order('j_id ASC')->select();
            $this->assign('structure', $structure);
            $this->assign('job', $job);
			return $this->fetch();
		}
    }

    /**
     * 删除管理员
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $id   = Request::instance()->post('id');
            $info = $this->DB->where('m_id', $id)->find();
            if (!$info) {
                $this->addLog(27, '需要删除的数据不存在', 3, false);
                $this->json('01', '需要删除的数据不存在');
            }
            # 如果需要删除超级管理员，则需要查询一次超级管理员个数
            if ($info['m_type'] == 1) {
                $num = $this->DB->where('m_type', 1)->count();
                if ($num == 1) {
                    $this->addLog(27, '系统至少需要保留一个超级管理员账号', 3, false);
                    $this->json('01', '系统至少需要保留一个超级管理员账号');
                }
            }

            $res = $this->DB->where('m_id', $id)->delete();
            if ($res) {
                $this->addLog(27, '删除成功', 1, false);
                $this->json('00', '删除成功');
            }

            $this->addLog(27, '删除失败', 2, false);
            $this->json('01', '删除失败');
        }
    }

    /**
     * 预览详情
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details(){
        $id   = Request::instance()->param('pid');
        $info = $this->DB
                ->alias('A')
                ->field('A.*, B.s_name, B.r_id as b_r_id, C.j_name, C.r_id as c_r_id')
                ->join('__STRUCTURE__ B', 'A.m_structure = B.s_id','LEFT')
                ->join('__JOB__ C', 'A.m_job = C.j_id','LEFT')
                ->where('A.m_id', $id)
                ->find();

        # 查询所拥有的角色
        $role_name = '';
        if ($info['m_type'] == 1) {
            $role_name = '无';
        }else{
            $id   = rtrim($info['b_r_id'], ',') .','. $info['c_r_id'];
            $role = Db::name('role')->field('r_name')->where("r_id in({$id})")->select();

            foreach ($role as $v) {
                if ($v['r_name'] != '无'){
                    $role_name .= '<div class="job" style="color: #fff">'.$v['r_name'].'</div>';
                }
            }
        }
        $info['role_name'] = $role_name;

        $this->assign('info', $info);
		
		$province_ids = Db::name('region')->field('r_id, r_name')->where('r_id', 'in', $info['m_province'])->select();
		$city_ids     = Db::name('region')->field('r_id, r_name')->where('r_id', 'in', $info['m_city'])->select();
		$area_ids     = Db::name('area')->field('r_id, r_name')->where('r_id', 'in', $info['m_area'])->select();
		
		$this->assign('province_ids', $province_ids);
		$this->assign('city_ids', $city_ids);
		$this->assign('area_ids', $area_ids);
		
        return $this->fetch();
    }

    /**
     * 修改管理员
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.03
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('pid');
        $res  = $this->DB
                ->alias('A')
                ->field('A.*, B.s_name, C.j_name')
                ->join('__STRUCTURE__ B', 'A.m_structure = B.s_id','LEFT')
                ->join('__JOB__ C', 'A.m_job = C.j_id','LEFT')
                ->where('A.m_id', $id)
                ->find();
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $user      = Request::instance()->post('user');
            $pwd       = Request::instance()->post('pwd');
            $phone     = Request::instance()->post('phone');
            $nice      = Request::instance()->post('nice');
            $structure = Request::instance()->post('structure');
            $job       = Request::instance()->post('job');
            $status    = Request::instance()->post('status');
            $existence = Request::instance()->post('existence');
            $type      = Request::instance()->post('type');
            $region    = Request::instance()->post('region');
            $province  = Request::instance()->post('province');
            $city      = Request::instance()->post('city');
            $area      = Request::instance()->post('area');
            $pwd       = md5($pwd . $res['m_time']);
            $region    = ($region == 1) ? 1 : $region;

            if ($user != $res['m_user']) {
                if ($this->DB->where('m_user', $user)->value('m_id')) {
                    $this->addLog(26, '用户已存在', 3, false);
                    $this->json('01', '用户已存在');
                }
            }

            $count  = $this->DB->where('m_type', 1)->count();
            if ($type == 1) {
                if ($type != $res['m_type']) {
                    if ($count >= 3) {
                        $this->addLog(26, '最多只能同时存在 3 个超级管理员', 3, false);
                        $this->json('01', '最多只能同时存在 3 个超级管理员');
                    }
                }
            } else {
                if ($count == 1) {
                    $this->addLog(26, '系统必须保留至少 1 个超级管理员', 3, false);
                    $this->json('01', '系统必须保留至少 1 个超级管理员');
                }
            }

            if ($count == 1 && $status == 2) {
                $this->addLog(26, '系统必须保留至少 1 个超级管理员状态开启！', 3, false);
                $this->json('01', '系统必须保留至少 1 个超级管理员状态开启！');
            }

            $data = [
                'm_nice'       => $nice,        // 姓名
                'm_user'       => $user,        // 用户名
                'm_phone'      => $phone,       // 手机
                'm_status'     => $status,      // 状态
                'm_type'       => $type,        // 超级管理员
                'm_existence'  => $existence,   // 是否已离职
                'm_nationwide' => $region,      // 全国权限
                'm_structure'  => $structure,   // 部门ID
                'm_job'        => $job,         // 岗位ID
            ];

            if (!empty($pwd)) {$data['m_pwd'] = $pwd;}
           
            # 不是全国地区管理权限
            if ($region != 1) {
                $data['m_province'] = $province;
                $data['m_city'] = $city;
                $data['m_area'] = $area;
            }else{
                $data['m_province'] = '';
                $data['m_city'] = '';
                $data['m_area'] = '';
            }
            
            $res =  $this->DB->where('m_id', $id)->update($data);
            if ($res > 0) {
                $this->addLog(26, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(26, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
			$province_ids = Db::name('region')->field('r_id, r_name')->where('r_id', 'in', $res['m_province'])->select();
			$city_ids     = Db::name('region')->field('r_id, r_name')->where('r_id', 'in', $res['m_city'])->select();
			$area_ids     = Db::name('area')->field('r_id, r_name')->where('r_id', 'in', $res['m_area'])->select();
			$structure    = Db::name('structure')->field('s_id, s_name')->order('s_sort DESC')->select();
			$job          = Db::name('job')->field('j_id, j_name')->order('j_id ASC')->select();

            $this->assign('structure', $structure);
            $this->assign('job', $job);
			$this->assign('province_ids', $province_ids);
            $this->assign('city_ids', $city_ids);
            $this->assign('area_ids', $area_ids);
            $this->assign('info', $res);
			return $this->fetch();
		}
    }

    /**
     * 修改个人配置信息
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function profile(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax() == false) {
            return $this->fetch();
        }
    
        $user      = Request::instance()->post('user');
        $pwd       = Request::instance()->post('pwd');
        $phone     = Request::instance()->post('phone');
        $nice      = Request::instance()->post('nice');
        
        if ($user != $this->admin['m_user']) {
            if ($this->DB->where('m_user', $user)->value('m_id')) {
                $this->addLog(37, '用户名已存在', 3, false);
                $this->json('01', '用户名已存在');
            }
        }

        $data = [
            'm_nice'       => $nice,        // 姓名
            'm_user'       => $user,        // 用户名
            'm_phone'      => $phone,       // 手机
        ];

        if (!empty($pwd)) {$data['m_pwd'] = md5($pwd.$this->admin['m_time']);}
        
        $res =  $this->DB->where('m_id', $this->admin['m_id'])->update($data);
        if ($res > 0) {
            $this->addLog(37, '修改成功', 1, false);
            $this->json('00', '修改成功，系统将自动退出本次登录...');
        }

        $this->addLog(37, '修改失败', 2, false);
        $this->json('01', '修改失败'); 
    }

}