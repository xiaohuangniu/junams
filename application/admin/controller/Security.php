<?php
// +----------------------------------------------------------------------
// | 安全管理
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

class Security extends Backend{
    protected $SENSITIVE_PATH; // 敏感词文件存放地址

    /**
     * 初始化定义数据
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function _initialize() {
		parent::_initialize();  
        $this->SENSITIVE_PATH = ROOT_PATH . 'public' .DS. 'txt' .DS. 'sensitive.conf';
    }

    /**************************************** 敏感词 ****************************************/

    /**
     * 敏感词列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function sensitive(){
        if (!file_exists($this->SENSITIVE_PATH)) {
            file_put_contents($this->SENSITIVE_PATH, '',FILE_APPEND);
            chmod($this->SENSITIVE_PATH, 0777);
        }

        $content = file_get_contents($this->SENSITIVE_PATH);
        $this->assign('content', $content);
        $this->assign('num', count(explode('|', $content)));
        return $this->fetch();
    }

    /**
     * 修改敏感词
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function sensitive_upd(){
        $content = Request::instance()->post('content');
        $res = file_put_contents($this->SENSITIVE_PATH, $content);
        if ($res) {
            $this->addLog(31, '修改成功', 1, false);
            $this->json('00', '修改成功');
        }
        $this->addLog(31, '修改失败', 2, false);
        $this->json('01', '修改失败');
    }

    /************************************* 黑名单IP管理 **************************************/

    /**
     * 黑名单IP列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function blackip(){
        $list = Db::name('black_ip')
                ->alias('A')
                ->field('A.*, B.m_nice')
                ->join('__MANAGER__ B', 'A.m_id = B.m_id')
                ->order('A.bi_time DESC')
                ->select();
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 新增封禁IP
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function blackip_add(){
        $ip     = Request::instance()->post('ip');
        $status = Request::instance()->post('status');
        $DB     = Db::name('black_ip');
        
        if (empty($ip)) {
            $this->addLog(32, 'IP不能为空', 3, false);
            $this->json('01', 'IP不能为空');
        }

        $data = [
            'bi_ip' => $ip,
            'bi_status' => $status,
            'bi_time' => time(),
            'm_id' => $this->admin['m_id'],
        ];

        $res = $DB->insert($data);
        if ($res) {
            $this->addLog(32, '新增成功', 1, false);
            $this->json('00', '新增成功');
        }

        $this->addLog(32, '新增失败', 2, false);
        $this->json('01', '新增失败');
    }

    /**
     * 修改封禁IP
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function blackip_upd(){
        $id     = Request::instance()->post('upd_id');
        $ip     = Request::instance()->post('ip');
        $status = Request::instance()->post('status');
        $DB     = Db::name('black_ip');
        
        if (empty($ip)) {
            $this->addLog(33, 'IP不能为空', 3, false);
            $this->json('01', 'IP不能为空');
        }

        $data = [
            'bi_ip' => $ip,
            'bi_status' => $status,
            'bi_time' => time(),
            'm_id' => $this->admin['m_id'],
        ];

        $res = $DB->where('bi_id', $id)->update($data);
        if ($res) {
            $this->addLog(33, '修改成功', 1, false);
            $this->json('00', '修改成功');
        }

        $this->addLog(33, '修改失败', 2, false);
        $this->json('01', '修改失败');
    }

    /**
     * 删除封禁IP
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.30
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function blackip_del(){
        $id = Request::instance()->post('id');

        $res = Db::name('black_ip')->where('bi_id', $id)->delete();
        if ($res) {
            $this->addLog(34, '删除成功', 1, false);
            $this->json('00', '删除成功');
        }

        $this->addLog(34, '删除失败', 2, false);
        $this->json('01', '删除失败');
    }
    
}
