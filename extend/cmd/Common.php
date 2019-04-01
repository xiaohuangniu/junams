<?php
// +----------------------------------------------------------------------
// | CMD命令 - 公共方法
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace cmd;

class Common{
    
    /**
     * 输出前端JSON接口结构
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.8 + 2018.11.22
     * @deprecated 暂不启用
     * @global 无
     * @param strting $code 状态码 00|01 成功|失败
     * @param string $msg 接口描述
     * @param mixed $data 接口返回值
     * @return void
    */
    protected static function json($code='00', $msg='成功', $data='') {
        echo json_encode([
            'code' => "{$code}",
            'msg'  => "{$msg}",
            'data' => $data,
        ], JSON_UNESCAPED_UNICODE);exit;
    }

}