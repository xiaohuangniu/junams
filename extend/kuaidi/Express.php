<?php
// +----------------------------------------------------------------------
// | 快递查询API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace kuaidi;
use think\Db;

class Express {
    /**
     * 调用快递查询
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.3 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $order 快递单号
     * @param string $type  快递类型，为空将自动识别
     * @return json
    */
    public static function run($order='', $type=''){    
        $sms_status = Db::name('config')->where('id',1)->value('express_status');
        if ($sms_status == 0) {
            return false;
        # 快递100
        } else if ($sms_status == 1) {
            $obj = new \kuaidi\Kuaidi\Kd100();
            return $obj->Obtain($order, $type);
        # 快递kdcx.cn
        } else if ($sms_status == 2) {
            $obj = new \kuaidi\Kuaidi\Kdcx();
            return $obj->Obtain($order, $type);
        }
    }
}