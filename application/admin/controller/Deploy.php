<?php
// +----------------------------------------------------------------------
// | 全站API配置管理
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

class Deploy extends Backend {

    /**
     * 配置列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index() {
        $info = Db::name('config')->where('id', 1)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }
    
    /**
     * 修改配置
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.3 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd() {
        if (Request::instance()->isAjax()) {
            $file = request()->file('file');
            $type = Request::instance()->param('type');
            $path = ROOT_PATH . 'extend' . DS . 'weixin' . DS . 'ssl_path' . DS;
            if (!is_writable($path)) {
                echo json_encode([
                    'code' => '01',
                    'msg'  => '请给与0777权限：'.$path,
                    'data' => '',
                ], JSON_UNESCAPED_UNICODE);exit;
            }
            if($file){
                # 默认最大上传2M图片文件-原名上传
                $info = $file->validate(['size'=>\qiniu\Qiniu::get_size(),'ext'=>'pem'])->move($path,'');
                if($info){
                    $name = $info->getSaveName();
                    $path = $path.$name;
                    # 成功上传后 获取上传信息
                    if ($path) {
                        if ($type == 1) {
                            $data = ['weixin_sslcert_path'=>$path];
                            $this->addLog(38, '上传微信cert证书', 1, false);
                        } else {
                            $data = ['weixin_sslkey_path'=>$path];
                            $this->addLog(38, '上传微信key证书', 1, false);
                        }
                        Db::name('config')->where('id', 1)->data($data)->update();
                        echo json_encode([
                            'code' => 0,
                            'msg'  => '上传成功',
                            'data' => $path
                        ], JSON_UNESCAPED_UNICODE);exit;
                    }
                }
                # 上传失败获取错误信息
                echo json_encode([
                    'code' => '01',
                    'msg'  => '上传失败：'.$file->getError(),
                    'data' => '',
                ], JSON_UNESCAPED_UNICODE);exit;
            }
            exit;
        }

        $data = Request::instance()->post();
        if (isset($data['file'])) { unset($data['file']);}
        if (isset($data['weixin_appid']) && empty($data['weixin_login_ype'])) {
            $data['weixin_login_ype'] = 0;
        }
        if (isset($data['qiniu_size']) && empty($data['qiniu_status'])) {
            $data['qiniu_status'] = 0;
        }
        if (isset($data['weixin_appid']) && empty($data['weixin_vif'])) {
            $data['weixin_vif'] = 0;
        }
        if (isset($data['weixin_appid']) && empty($data['weixin_auto'])) {
            $data['weixin_auto'] = 0;
        }

        $res = Db::name('config')->where('id', 1)->data($data)->update();
        if ($res !== false)  $this->addLog(38, '修改成功', 1);
        $this->addLog(38, '删除失败', 2);
    }

    /**
     * 更新微信菜单操作
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function wx_menu_save() {
        $menu = Request::instance()->post('menu');
        $res = Db::name('config')->where('id', 1)->data(['weixin_menu' => $menu])->update();
        if ($res !== false) {
            $res = \weixin\Weixin::save_menu();
            if ($res === true) {
                $this->addLog(39, '更新微信菜单成功', 1, false);
                $this->json('00', '更新微信菜单成功');
            } else {
                $this->addLog(39, '更新微信菜单失败：'.$res, 2, false);
                $this->json('01', '更新微信菜单失败：'.$res);
            }
        }
        $this->addLog(39, '更新微信菜单失败：写入配置文件失败', 2, false);
        $this->json('01', '更新微信菜单失败：写入配置文件失败');
    }

    /**
     * 更新微信菜单操作
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function wx_menu_laqu() {
        $res = \weixin\Weixin::get_menu();
        $this->addLog(40, '拉取微信菜单成功', 1, false);
        $this->json('00', '拉取微信菜单成功', $res);
    }

    /**
     * 删除微信菜单操作
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function wx_menu_delete() {
        $res = \weixin\Weixin::delete_menu();
        if ($res) {
            $res = Db::name('config')->where('id', 1)->data(['weixin_menu' => ''])->update();
            if ($res !== false) {
                $this->addLog(41, '删除微信菜单成功', 1, false);
                $this->json('00', '删除微信菜单成功');
            }
            $this->addLog(41, '删除微信菜单成功，但配置表菜单代码删除失败', 2, false);
            $this->json('01', '删除微信菜单成功，但配置表菜单代码删除失败');
        }
        $this->addLog(41, '删除微信菜单失败', 2, false);
        $this->json('00', '删除微信菜单失败');
    }

}