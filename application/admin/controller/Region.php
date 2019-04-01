<?php
// +----------------------------------------------------------------------
// | 地区管理
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

class Region extends Backend{
    protected $DB; // 地区表

    /**
     * 初始化定义数据模型
     * @author  冯俊豪
     * @version 1.0.0.1
     * @return  无
     */
    public function _initialize() {
		parent::_initialize();  
        $this->DB = Db::name('region');
    }
    
    /**
     * 地区列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        # 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $pid  = Request::instance()->post('id');
			$list = $this->DB->where("r_pid = '{$pid}' OR r_id = '{$pid}'")->select();
            if (count($list) == 1 && $list[0]['r_type'] == 2) {
                $list = Db::name('area')->where("r_pid = '{$pid}'")->select();
            }
            echo json_encode($list);
        } else {
            # 获取一级省
            $list = $this->DB->where('r_pid = 0')->select();
            $this->assign('list', $list);

            # 获取所有地区节点
            $list = $this->DB->field('r_id as id, r_name as name,  r_pid as pid')->select();
            $this->assign('json', json_encode(menuFor($list)) );

            return $this->fetch();
        }
    }

    /**
     * 删除地区
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function del(){
        $id   = Request::instance()->param('id');
        $info = $this->DB->where("r_id = '{$id}'")->find();

        # 省市
        if ($info) {
            $info = $this->DB->where("r_pid = '{$id}'")->find();
            if (!$info) {
                $res = $this->DB->where("r_id = '{$id}'")->delete();
            } else {
                $this->addLog(15, '该地区下还存在节点，请先删除所有子节点', 3, false);
                $this->json('01', '该地区下还存在节点，请先删除所有子节点');
            }
        # 区
        } else {
            $res = Db::name('area')->where("r_id = '{$id}'")->delete();
        }
        
        if ($res) {
            $this->addLog(15, '删除成功', 1, false);
            $this->json('00', '删除成功', $id);
        }
        
        $this->addLog(15, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }

    /**
     * 修改地区
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$id     = Request::instance()->post('id');
			$pid    = Request::instance()->post('pid');
			$sort   = Request::instance()->post('sort');
			$name   = Request::instance()->post('name');
			$code   = Request::instance()->post('code');
			$pinyin = Request::instance()->post('pinyin');
            $car_prefix = Request::instance()->post('car_prefix');
            $car_type = Request::instance()->post('car_type');

            # 简单过滤数据
            if (empty($name)) {
                $this->addLog(14, '地区名称不能为空', 3, false);
                $this->json('01', '地区名称不能为空');
            }
            if (empty($code)) {
                $this->addLog(14, '地区编码不能为空或0', 3, false);
                $this->json('01', '地区编码不能为空或0');
            }
           
            $level = $this->DB->where('r_id', $pid)->value('r_type');
            $type  = $level+1;
            # 等级为3是区级表123
            if ($type != 3) {
                $data = [
                    'r_pid'    => $pid,
                    'r_name'   => $name,
                    'r_pinyin' => $pinyin,
                    'r_code'   => $code,
                    'r_sort'   => $sort,	
                    'r_type'   => $type,	
                    'r_car_prefix' => $car_prefix,
                    'r_car_type' => $car_type,
                ];
                $res = $this->DB->where('r_id', $id)->update($data);
            } else {
                $data = [
                    'r_pid'    => $pid,
                    'r_name'   => $name,
                    'r_code'   => $code,	
                    'r_type'   => $type,
                ];
                $res = Db::name('area')->where('r_id', $id)->update($data);
            }

            if ($res > 0) {
                $this->addLog(14, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(14, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            # 获得修改的ID号
			$pid    = Request::instance()->param('pid');
            $info   = $this->DB->where('r_id', $pid)->find();
            if (!$info) {
                $info = Db::name('area')->where('r_id', $pid)->find();
                $info['r_car_type'] = '';
            }
            $name   = $this->DB->where('r_id', $info['r_pid'])->value('r_name');
            $this->assign('pid', $pid);
            $this->assign('name', $name?:'顶级');
            $this->assign('info', $info);

			# 获取所有地区节点
            $list = $this->DB->field('r_id as id, r_name as name,  r_pid as pid')->select();
            $this->assign('json', json_encode( menuFor($list)) );

            # 获取车辆使用性质
            $this->assign('Car_Nature', $this->Car_Nature());

			return $this->fetch();
		}
    }

    /**
     * 新增地区
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
			$pid    = Request::instance()->post('pid');
			$sort   = Request::instance()->post('sort');
			$name   = Request::instance()->post('name');
			$code   = Request::instance()->post('code');
			$pinyin = Request::instance()->post('pinyin');
            $car_prefix = Request::instance()->post('car_prefix');
            $car_type = Request::instance()->post('car_type');

            # 简单过滤数据
            if (empty($name)) {
                $this->addLog(13, '地区名称不能为空', 3, false);
                $this->json('01', '地区名称不能为空');
            }
            if (empty($code)) {
                $this->addLog(13, '地区编码不能为空或0', 3, false);
                $this->json('01', '地区编码不能为空或0');
            }

            $level = $this->DB->where('r_id', $pid)->value('r_type');
            $type  = $level+1;
            # 等级为3是区级表123
            if ($type != 3) {
                $data = [
                    'r_pid'    => $pid,
                    'r_name'   => $name,
                    'r_pinyin' => $pinyin,
                    'r_code'   => $code,
                    'r_sort'   => $sort,	
                    'r_type'   => $type,	
                    'r_car_prefix' => $car_prefix,
                    'r_car_type'=> $car_type,
                ];
                $res = $this->DB->insert($data);
            } else {
                $data = [
                    'r_pid'    => $pid,
                    'r_name'   => $name,
                    'r_code'   => $code,	
                    'r_type'   => $type,
                ];
                $res = Db::name('area')->insert($data);
            }
				
            if ($res > 0) {
                $this->addLog(13, '新增成功', 1, false);
                $this->json('00', '新增成功');
            }

            $this->addLog(13, '新增失败', 2, false);
            $this->json('01', '新增失败');
        }else{
            $pid    = Request::instance()->param('pid', 0);
            $name   = $this->DB->where('r_id', $pid)->field('r_name, r_type')->find();
            $this->assign('pid', $pid);
            $this->assign('name', $name?:'顶级');

			# 获取所有地区节点
            $list = $this->DB->field('r_id as id, r_name as name,  r_pid as pid')->select();
            $this->assign('json', json_encode( menuFor($list)) );

            # 获取车辆使用性质
            $this->assign('Car_Nature', $this->Car_Nature());

			return $this->fetch();
		}
    }

    /**
     * 搜索地区菜单(公共)
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function sou(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $key   = Request::instance()->post('key');
            $id    = Request::instance()->post('id');

            $where = [];
            $where['r_name'] = ['like', "%{$key}%"]; 
            if (!empty($id)) {
                $where['r_id'] = ['NEQ', $id]; 
            }

            $info = $this->DB->field('r_id, r_name')->where($where)->select();

            if (!$info) {
                $this->json('01', '暂无该地区');
            }

            $this->json('00', '获取成功', $info);
        }
    }
}
