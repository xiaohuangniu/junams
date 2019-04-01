<?php
// +----------------------------------------------------------------------
// | 阿里大鱼短信发送
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace sms;
use think\Db;

class Alidayu {
    
    /**
     * 调用发送接口
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.3 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $phone 接收短信手机号集合,多个用逗号分隔
     * @param mixed $param 短信变量内容，例如：{code:'验证码'}
     * @return string|bool
    */
    public function run($phone, $param) {
        $info = Db::name('config')->field('alidayu_app_key,alidayu_secret_key,alidayu_sign_name,alidayu_code')->where('id',1)->find();
        # 载入阿里大鱼官方SDK
        include EXTEND_PATH.'sms'.DS.'alidayu'.DS.'TopSdk.php';
        $c = new \TopClient();
        $c->appkey    = $info['alidayu_app_key'];
        $c->secretKey = $info['alidayu_secret_key'];
        $req = new \AlibabaAliqinFcSmsNumSendRequest();
        $req->setSmsType("normal");
        $req->setSmsFreeSignName($info['alidayu_sign_name']);
        $req->setSmsParam($param);
        $req->setRecNum($phone);
        $req->setSmsTemplateCode($info['alidayu_code']);
        $resp = $c->execute($req);

        if($resp->result->success == 'true'){
            return true;
        }
        
        return strval($resp->sub_msg);
    }
}