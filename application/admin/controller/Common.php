<?php
// +----------------------------------------------------------------------
// | 后台通用公共方法
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;
# 基类控制器加载
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;

class Common extends Controller {

    /**
     * 获取对应的省市列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @param int|string : $id ajax下传递的POST[id]
     * @return json
    */
    public function city(){
        $pid  = Request::instance()->post('id');
        $list = Db::name('region')->field('r_id as id, r_name as region_name')->where('r_pid', $pid)->select();
        echo json_encode($list);
    }

    /**
     * 获取对应的区域列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.9.29
     * @deprecated 暂不弃用
     * @global 无
     * @param int|string : $id ajax下传递的POST[id]
     * @return json
    */
    public function area(){
        $pid  = Request::instance()->post('id');
        $list = Db::name('area')->field('r_id as id, r_name as region_name')->where('r_pid', $pid)->select();
        echo json_encode($list);
    }

    /**
     * 更新
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function edition() {
        $edition = 'v1.2.1';
        $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, 'https://xiuxian.junphp.com/juncms/edition?edition='.$edition);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);        
        $res = curl_exec($curl);
        curl_close($curl);
        echo $res;
    }

    /**
     * layui编辑器上传文件
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.3 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add_images() {
        $file = request()->file('file');
        $path = ROOT_PATH . 'public' . DS . 'edit' . DS;

        if($file){
            $info = $file->validate([])->move($path);
            if($info){
                $name = $info->getSaveName();
                $path = $path.$name;
                # 是否需要压缩
                if (\qiniu\Qiniu::get_zip() == 1) {
                    \qiniu\Qiniu::image_png_size_add($path, $path);
                }
                # 关闭七牛云上传
                if (\qiniu\Qiniu::get_status() == 0) {
                    $url = str_replace(['\\', '//'],'/', dirname($_SERVER['SCRIPT_NAME']) .DS. 'public' .DS. 'edit' .DS. $name);
                } else {
                    # 要先释放TP5的实例，否则无法删除图片
                    unset($info);
                    $url  = \qiniu\Qiniu::put($path, $name);
                }
                # 成功上传后 获取上传信息
                if ($url) {
                    echo json_encode([
                        'code' => 0,
                        'msg'  => '上传成功',
                        'data' => [
                            'src' => $url
                        ],
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
    }

    /**
     * wangEditor编辑器上传文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.20
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function wangEditor() {
        $file = request()->file('file');
        $path = ROOT_PATH . 'public' . DS . 'edit' . DS;

        if($file){
            # 默认最大上传2M图片文件
            $info = $file->validate(['size'=>\qiniu\Qiniu::get_size(),'ext'=>\qiniu\Qiniu::get_type()])->move($path);
            if($info){
                $name = $info->getSaveName();
                $path = $path.$name;
                # 是否需要压缩
                if (\qiniu\Qiniu::get_zip() == 1) {
                    \qiniu\Qiniu::image_png_size_add($path, $path);
                }
                # 关闭七牛云上传
                if (\qiniu\Qiniu::get_status() == 0) {
                    $url = str_replace(['\\', '//'],'/', dirname($_SERVER['SCRIPT_NAME']) .DS. 'public' .DS. 'edit' .DS. $name);
                } else {
                    # 要先释放TP5的实例，否则无法删除图片
                    unset($info);
                    $url  = \qiniu\Qiniu::put($path, $name);
                }
                # 成功上传后 获取上传信息
                if ($url) {
                    echo json_encode([
                        'errno' => 0,
                        'msg'  => '上传成功',
                        'data' => [
                            $url
                        ],
                    ], JSON_UNESCAPED_UNICODE);exit;
                }
                
            }
            # 上传失败获取错误信息
            echo json_encode([
                'code' => '01',
                'msg'  => '上传失败：'.$file->getError(),
                'data' => '上传失败：'.$file->getError(),
            ], JSON_UNESCAPED_UNICODE);exit;
        }
    }

    /**
     * editor编辑器上传文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function editor() {
        $file = request()->file('editormd-image-file');
        $path = ROOT_PATH . 'public' . DS . 'edit' . DS;
        $url  = '';

        if($file){
            # 默认最大上传2M图片文件
            $info = $file->validate(['size'=>\qiniu\Qiniu::get_size(),'ext'=>\qiniu\Qiniu::get_type()])->move($path);
            if($info){
                $name = $info->getSaveName();
                $path = $path.$name;
                # 是否需要压缩
                if (\qiniu\Qiniu::get_zip() == 1) {
                    \qiniu\Qiniu::image_png_size_add($path, $path);
                }
                # 关闭七牛云上传
                if (\qiniu\Qiniu::get_status() == 0) {
                    $url = str_replace(['\\', '//'],'/', dirname($_SERVER['SCRIPT_NAME']) .DS. 'public' .DS. 'edit' .DS. $name);
                } else {
                    # 要先释放TP5的实例，否则无法删除图片
                    unset($info);
                    $url  = \qiniu\Qiniu::put($path, $name);
                }
            }
            # 成功上传后 获取上传信息
            if ($url) {
                $return = json_encode([
                    'success' => 1,
                    'message'  => '上传成功',
                    'url' => $url
                ], JSON_UNESCAPED_UNICODE);
            } else {
                # 上传失败获取错误信息
                $return = json_encode([
                    'success' => 0,
                    'message'  => '上传失败：'.$file->getError(),
                    'url' => '',
                ], JSON_UNESCAPED_UNICODE);
            }
            
            header('Content-Type:application/json;charset=utf8');
            die($return);
        }
    }

    /**
     * 删除图片
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete_img() {
        $url  = Request::instance()->param('url');
        $array = explode('public', $url);
        $res  = @unlink( ROOT_PATH.'public'.$array[1]);
        
        if ($res !== false) {
            $return = json_encode([
                'code' => '00',
                'msg'  => '删除成功'
            ], JSON_UNESCAPED_UNICODE);
        } else {
            $return = json_encode([
                'code' => '01',
                'msg'  => '删除失败'
            ], JSON_UNESCAPED_UNICODE);
        }
        
        header('Content-Type:application/json;charset=utf8');
        die($return);
    }

    /**
     * 微信认证
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function weixin_vif() {
        $info = Db::name('config')->where('id', 1)->field('weixin_vif, weixin_auto')->find();
        # 进行微信认证
        if ($info['weixin_vif'] == 0) {
            $res = \weixin\Weixin::token_vif();
            if ($res) {
                Db::name('config')->where('id', 1)->data(['weixin_vif'=>1])->update();
            }
            exit;
        }
        
        # 处理自动回复
        if ($info['weixin_auto'] == 1) {
            $postObj = \weixin\Weixin::get_xml();
            if ($postObj->MsgType != 'event') {
                # 微信发送过来的内容
                $keyword = trim($postObj->Content);
                \weixin\Weixin::add_log(['收到消息内容：'=>$keyword]);
                # 标准查询
                $where = ['status'=>1];
                $where['name'] = $keyword;
                $info = Db::name('weixin_reply')->where($where)->order('rates DESC')->field('id,content')->find();
                # 模糊查询
                if (!$info) {
                    $where['name'] = ['like',"%{$keyword}%"];
                    $info = Db::name('weixin_reply')->where($where)->order('rates DESC')->field('id,content')->find();
                }
                if (!$info) {
                    $info = ['content'=>'暂无该消息'];
                } else {
                    Db::name('weixin_reply')->where('id', $info['id'])->setInc('rates');
                }
                echo \weixin\Weixin::transmit_text($postObj, $info['content']);
            }
        }
        exit;
    }

    /**
     * 检测流量峰值类型
     * @todo 无
     * @author 小黄牛
     * @version v1.1.0 + 2018.12.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function vif_flow() {
        $data = \org\Cpu::get_work();
        // 先取出网卡详情
        foreach ($data['NetWorkName'] as $k=>$v) {
            // lo 回环网卡跳过
            if ($v == 'lo') { continue; }

            if (!empty($data['OutSpeed'][$k][4])) {
                die('当前总流量：'.$data['OutSpeed'][$k][4].'TB');
            } else if (!empty($data['OutSpeed'][$k][3])) {
                die('当前总流量：'.$data['OutSpeed'][$k][3].'GB');
            } else if (!empty($data['OutSpeed'][$k][2])) {
                die('当前总流量：'.$data['OutSpeed'][$k][2].'MB');
            } else if (!empty($data['OutSpeed'][$k][1])) {
                die('当前总流量：'.$data['OutSpeed'][$k][1].'KB');
            } 

            die('检测异常!');
        } 
    }


}
