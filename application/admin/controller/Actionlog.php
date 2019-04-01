<?php
// +----------------------------------------------------------------------
// | 管理员操作日志管理
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

class Actionlog extends Backend{

    /**
     * 操作日志列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @param string $int 测试儿啊啊
     * @param mixed $int 测试
     * @return void
    */
    public function index(){
       $list = Db::name('manager_action_log')
               ->field('A.*, B.lt_name, C.m_nice')
               ->alias('A')
               ->join('__LOG_TYPE__ B',' A.mal_type = B.lt_id')
               ->join('__MANAGER__ C',' A.m_id = C.m_id')
               ->order('A.mal_time DESC')
               ->paginate(15);

        $this->assign('list', $list);
        $this->assign('page', $list->render());
        return $this->fetch();
    }

    /**
     * 清空所有操作日志
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function emptyall(){
        $res = Db::name('manager_action_log')->where("mal_id > 0")->delete();
        if ($res) $this->addLog(30, '清空成功', 1);
        $this->addLog(30, '清空失败', 2);
    }

    /**
     * 操作日志删除
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
        $data = Request::instance()->param();
        $id   = $data['id'];
        # 检测是否批量删除
        if (is_array($id)) {
            $id = implode(',', $id);
        }

        $res = Db::name('manager_action_log')->where("mal_id in($id)")->delete();
        if ($res) $this->addLog(29, '删除成功', 1);
        $this->addLog(29, '删除失败', 2);
    }

    /**
     * 预览详情
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function details(){
        $id   = Request::instance()->param('id');
        $info = Db::name('manager_action_log')
                ->alias('A')
                ->field('A.*, B.*, C.lt_name, D.s_name, D.r_id as b_r_id, E.j_name, E.r_id as c_r_id')
                ->join('__MANAGER__ B', 'A.m_id = B.m_id','LEFT')
                ->join('__LOG_TYPE__ C', 'A.mal_type = C.lt_id','LEFT')
                ->join('__STRUCTURE__ D', 'B.m_structure = D.s_id','LEFT')
                ->join('__JOB__ E', 'B.m_job = E.j_id','LEFT')
                ->where('A.mal_id', $id)
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

        # 获取IP所属地区
        $res    = isTaobao($info['mal_ip']);
        $region = $res['region'] ?: '无';
        $city   = $res['city']   ?: '无';
        $area   = $res['county'] ?: '无';
        $isp    = $res['isp'];

        $this->assign('region', $region .' - '. $city .' - '. $area);
        $this->assign('isp', $isp);
        return $this->fetch();
    }
}
