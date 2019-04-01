<?php
// +----------------------------------------------------------------------
// | 短信发送API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace sms;
use think\Db;
use sms\Miaodi;
use sms\Alidayu;

class Sms {
    /**
     * 调用发送接口
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.3 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $phone 接收短信手机号集合,多个用逗号分隔
     * @param mixed $param 短信变量内容，就是你短信模板里的{}，多个用,逗号隔开
     * @return string|bool
    */
    public static function run($phone, $param) {
        $sms_status = Db::name('config')->where('id',1)->value('sms_status');
        if ($sms_status == 0) {
            return false;
        # 秒嘀
        } else if ($sms_status == 1) {
            $obj = new Miaodi();
            return $obj->run($phone, $param);
        # 阿里大鱼
        } else if ($sms_status == 2) {
            $obj = new Alidayu();
            return $obj->run($phone, $param);
        }
    }
}