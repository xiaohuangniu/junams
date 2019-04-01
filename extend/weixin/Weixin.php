<?php
// +----------------------------------------------------------------------
// | 微信开发API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace weixin;
use think\Request;
use think\Db;
use weixin\Weixin\Wxconfig;
use weixin\lib\WxPayApi;
use weixin\lib\WxPayConfig;
use weixin\lib\WxPayDataBase;
use weixin\lib\WxPayException;
use weixin\lib\WxPayBizPayUrl;
use weixin\lib\WxPayUnifiedOrder;

class Weixin {
    private static $Config; // 微信配置
    private static $data;   // jsapi支付相关参数

    /**
     * 获取微信配置
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return string|bool
    */
    public static function config() {
        if (is_array(self::$Config)) return false;
        # 获得表中配置信息 
        self::$Config = Db::name('config')->field('weixin_login_ype, weixin_appsecret, weixin_appid, weixin_token, weixin_aeskey, weixin_moban_id, weixin_menu,weixin_actoken_time,weixin_debug')->where('id',1)->find();
        # 获得静态配置信息
        $Config = Wxconfig::get();
        # 合并配置信息
        self::$Config = array_merge(self::$Config, $Config);
    }

    /**
     * 微信认证验证
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	public static function token_vif(){
        self::config();
        $request = Request::instance();
        # 获得微信发送过来的加密签名
		$signature = $request->param("signature");
		# 时间戳
		$timestamp = $request->param("timestamp");
		# 随机数
		$nonce = $request->param("nonce");
        
		# Token + 时间戳 + 随机数 = 组合成数组
		$tmpArr = [self::$Config['weixin_token'], $timestamp, $nonce];
		# 对数组进行升序重新排序
		sort($tmpArr, SORT_STRING);
		# 把数组for拼接成字符串
		$tmpStr = implode( $tmpArr );
		# 进行sha1加密
        $tmpStr = sha1( $tmpStr );
        
		# 接收微信向你服务器发送过来的随机字符串
        $echoStr = $request->param("echostr");
        # 写入日志
        self::add_log([
            '微信认证处理',
            '加密签名'=>$signature,
            '时间戳'=>$timestamp,
            '随机数'=>$nonce,
            '随机字符串'=>$echoStr,
        ]);
		# 最后与微信发送过来的加密签名进行对比，成功返回随机字符串给微信,告诉它认证通过了
		if( $tmpStr == $signature && $echoStr) {
            header('content-type:text');
            echo $echoStr;
            return true;
        }
        exit;
    }

    /***************************************** 微信支付相关 ****************************************/
    /**
     * 生成JSAPI需要的json参数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $Body 商品描述
     * @param string $attach 附加数据
     * @param string $total_fee 商品金额，单位是：分
     * @param string $trade_no 商品订单号，要具有唯一性，默认是时间戳
     * @param string $goods_tag 商品代金券说明
     * @return void JSAPI需要的参数
    */
    public static function jsapi($body, $attach, $total_fee, $trade_no=null, $goods_tag='no'){
        WxPayConfig::Config();
        # 默认订单号是时间戳
         $trade_no = empty($trade_no) ? time() : $trade_no;
        //①、获取用户openid
        $openId = self::GetOpenid();
        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody($body); // 商品描述
        $input->SetAttach($attach);// 附加数据
        $input->SetOut_trade_no($trade_no);// 商品订单号， 要是唯一
        $input->SetTotal_fee($total_fee*100);// 金额：分
        $input->SetTime_start(date("YmdHis"));// 交易开始时间
        $input->SetTime_expire(date("YmdHis", time() + 600));// 交易过期时间
        $input->SetGoods_tag($goods_tag);// 商品代金券
        $input->SetNotify_url(WxPayConfig::$JSAPI_RETURN);// 回调地址
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);// 用户的Openid
        $order = WxPayApi::unifiedOrder($input);
        return $order;
    }

    /**
     * 微信二维码支付：模式一
     * @todo 注意：二维码要使用Weixin::qrcode()生成
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $productId 商品ID
     * @return string 返回二维码链接
    */
	public static function qrpay_1($productId) {
		$biz = new WxPayBizPayUrl();
		$biz->SetProduct_id($productId);
		try{
			$config = new WxPayConfig();
			$values = WxpayApi::bizpayurl($config, $biz);
		} catch(Exception $e) {
            throw new WxPayException("参数错误");
        }
        
        $url = "weixin://wxpay/bizpayurl?" . self::PayToUrlParams($values);
		return $url;
    }

    /**
     * 微信二维码支付：模式二
     * @todo 注意：二维码要使用Weixin::qrcode()生成
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $Body 商品描述
     * @param string $attach 附加数据
     * @param string $total_fee 商品金额，单位是：分
     * @param string $product_id 商品ID
     * @param string $trade_no 商品订单号，要具有唯一性，默认是时间戳
     * @param string $goods_tag 商品代金券说明
     * @return string|bool 返回二维码链接
    */
    public static function qrpay_2($body, $attach, $total_fee, $product_id, $trade_no=null, $goods_tag='no'){
        WxPayConfig::Config();
        if (empty($trade_no)) {
            $trade_no = date("YmdHis");
        }
        $input = new WxPayUnifiedOrder();
        $input->SetBody($body); // 商品描述
        $input->SetAttach($attach);// 附加数据
        $input->SetOut_trade_no($trade_no);// 商品订单号， 要是唯一
        $input->SetTotal_fee($total_fee*100);// 金额：分
        $input->SetTime_start(date("YmdHis"));// 交易开始时间
        $input->SetTime_expire(date("YmdHis", time() + 600));// 交易过期时间
        $input->SetGoods_tag($goods_tag);// 商品代金券
        $input->SetNotify_url(WxPayConfig::$QRCODE_RETURN);// 回调地址
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($product_id);// 用户的Openid
        $config = new WxPayConfig();
        $result = WxPayApi::unifiedOrder($input);
        if (isset($result['code_url'])) return $result["code_url"];
        return false;
    }

    /**
     * 生成图片二维码
     * @todo 使用QRcode库
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 二维码内容
     * @return void
    */
    public static function qrcode($url) {
        header('Content-Type: image/png');
        \weixin\lib\QRcode::png($url);
        exit;
    }
    
    /**
     * 查询微信支付订单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $transaction_id 微信系统订单号
     * @param string $out_trade_no 商户自定义单号
     * @return void 查询到的订单信息
    */
    public static function get_wx_order($transaction_id='', $out_trade_no=''){
        # 优先处理 微信系统订单号
        if (!empty($transaction_id)){
            $input = new WxPayOrderQuery();
            $input->SetTransaction_id($transaction_id);
            return WxPayApi::orderQuery($input);
        }

        # 次级处理 商户自定义单号
        $input = new WxPayOrderQuery();
        $input->SetOut_trade_no($out_trade_no);
        return WxPayApi::orderQuery($input);
    }

    /**
     * 微信支付订单申请退款
     * @todo 退款金额不能大于订单总额，如果调用时出现CURL错误，请参考这个网址进行解决： http://blog.csdn.net/Hiking_Tsang/article/details/52667781
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $total_fee 订单总金额
     * @param string $refund_fee 退款金额
	 * @param string $transaction_id 微信系统订单号 二选一 优先
     * @param string $out_trade_no 商户自定义单号 二选一 次级
     * @return void 退款返回值
    */
    public function out_wx_order($total_fee, $refund_fee, $transaction_id='', $out_trade_no=''){
        # 检查金额是否带有小数点 - 是则把小数点去掉
        $total_fee  = self::money($total_fee);
        $refund_fee = self::money($refund_fee);

        # 优先处理 微信系统订单号
        if (!empty($transaction_id)){
            $input = new WxPayRefund();
            $input->SetTransaction_id($transaction_id);
            $input->SetTotal_fee($total_fee);
            $input->SetRefund_fee($refund_fee);
            $input->SetOut_refund_no(WxPayConfig::MCHID.date("YmdHis"));
            $input->SetOp_user_id(WxPayConfig::MCHID);
            $arr = WxPayApi::refund($input);
        }else{
            # 次级处理 商户自定义单号
            $input = new WxPayRefund();
            $input->SetOut_trade_no($out_trade_no);
            $input->SetTotal_fee($total_fee);
            $input->SetRefund_fee($refund_fee);
            $input->SetOut_refund_no(WxPayConfig::MCHID.date("YmdHis"));
            $input->SetOp_user_id(WxPayConfig::MCHID);
            $arr = WxPayApi::refund($input);
        }
        # 写入日志
        self::add_log([
            '微信订单申请退款返回值',
            'Body'  => json_encode($arr)
        ]);
        return $arr;
    }

    /**
     * 微信支付订单退款查询
     * @todo 四个参数只需要填写一个，其余为空即可
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $refund_id 微信退款单号 一级
     * @param string $transaction_id 微信系统订单号 二级
	 * @param string $out_trade_no 商户自定义单号 三级
     * @param string $out_refund_no 商户退款单号 四级
     * @return void 查询返回值 $data['result_code'] SUCCESS 申请成功
     *              退款状态： $data['refund_status_$n'] $n一般为0 ，SUCCESS|FAIL|PROCESSING|CHANGE    退款成功|退款失败|退款处理中|转入代发
     *              CHANGE|转入代发 退款到银行发现用户的卡作废或者冻结了，导致原路退款银行卡失败，资金回流到商户的现金帐号，需要商户人工干预，通过线下或者财付通转账的方式进行退款。
    */
    public function get_out_wx_order($refund_id='', $transaction_id='', $out_trade_no='', $out_refund_no=''){
        $input = new WxPayRefundQuery();
        # 微信退款单号 优先
        if (!empty($refund_id)){
            $input->SetRefund_id($refund_id);
        }else if(!empty($transaction_id)){ # 微信订单号 二级
            $input->SetTransaction_id($transaction_id);
        }else if(!empty($out_trade_no)){# 商户自定义单号 三级
            $input->SetOut_trade_no($out_trade_no);
        }else{# 商户退款单号 四级
            $input->SetOut_refund_no($out_refund_no);
        }
        $arr = WxPayApi::refundQuery($input);
        # 写入日志
        self::add_log([
            '微信订单退款查询返回值',
            'Body'  => json_encode($arr)
        ]);
        return $arr;
    }

    /**
     * 下载微信支付对账单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.7 + 2018.10.17
     * @deprecated 暂不弃用
     * @global 无
     * @param string $time 对账单日期时间：精确到日 20170227
     * @param string $type 对账单类型：ALL|SUCCESS|REFUND|REVOKED 所有订单|成功支付订单|退款订单|撤销订单
     * @return array 一个三维数组，top是table的表题值，body是内容值
    */
    public function download_order($time, $type='ALL'){
        # 全转大写
        $type = strtoupper($type);
        $input = new WxPayDownloadBill();
        $input->SetBill_date($time);
        $input->SetBill_type($type);
        $res = WxPayApi::downloadBill($input);
        $arr = explode(' ', $res);
        # 生成表单 Top值
        $top = explode(',', array_shift($arr));
        # 生成表单 Body值
        foreach ($arr as $k=>$v){
            $arr[$k] = explode(',', str_replace("`", '', $v));
        }
        # 写入日志
        self::add_log([
            '微信支付对下账单下载',
            'top'  => $top,
            'body' => $arr
        ]);
        return $array;
    }

    /**************************************** 微信二维码相关 ***************************************/

    /**
     * 创建微信二维码
     * @todo 注意：不是支付二维码
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $val 二维码参数
     * @param mixed $type 二维码的类型  1|2|3  =  临时|永久|永久的字符串参数值
     * @return string 二维码的url
    */
	public static function get_qrcode($val, $type = 1) {
        # 根据类型，选择不同的二维码请求
        switch($type){
            case '1':
                $val = intval($val);
                $jsondata = '{"expire_seconds": 2592000,"action_name": "QR_SCENE","action_info":{"scene":{"scene_id": '.$val.'}}}';
                break;
            case '2':
                $val = intval($val);
                $jsondata = '{"action_name": "QR_LIMIT_SCENE","action_info":{"scene":{"scene_id": '.$val.'}}}';
                break;
            case '3':
                $jsondata = '{"action_name": "QR_LIMIT_STR_SCENE","action_info":{"scene":{"scene_str": '.$val.'}}}';
                break;
        }

        # 发送请求
        $token = self::get_token();
        # 使用OpenID去获取用户信息
        $url   = self::str_url(self::$Config['Qrcode_Add_Url'], [$token]);
        $json  = self::https_curl($url, $jsondata);
        $res   = json_decode($json, true);
        
        # 发送请求
        $url    = self::str_url(self::$Config['Qrcode_Get_Url'], [urlencode($res['ticket'])]);
        return $url;
    }
    
    /**
     * 长链接转短链接接口
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $long_url 长链接转短链接
     * @return string|bool
    */
    public static function get_shorturl($long_url) {
        # 发送请求
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Short_Url'], [$token]);
        $json  = self::https_curl($url, json_encode([
            'action' => 'long2short',
            'long_url' => $long_url,
        ]));
        $res   = json_decode($json, true);
        if ($res['errcode'] == 0) {
            return $res['short_url'];
        }
        return false;
    }

    /************************************** 微信浏览器登录相关 *************************************/
    /**
     * 生成网页登录授权链接
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 授权后重定向的回调链接地址
	 * @param string $state 自己定义的参数，具体看微信开发手册
     * @return string
    */
	public static function wx_login($url, $state=1){
        self::config();
        if (self::$Config['weixin_login_ype'] == 1) {
            $status = 'snsapi_base';
        } else {
            $status = 'snsapi_userinfo';
        }

        $array = [self::$Config['weixin_appid'], urlencode($url), $status, $state];
        return self::str_url(self::$Config['Snsapi_Url'], $array);
    }

    /**
     * 根据code去获取特殊access_token
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $code 授权后返回的code参数
     * @return array|bool
    */
	public static function get_code_token($code=''){
        if (empty($code)) {
            $code = $_GET['code'];
        }
        self::config();
        $url = self::str_url(self::$Config['Snsapi_AcToken_Url'], [
            self::$Config['weixin_appid'],
			self::$Config['weixin_appsecret'],
			$code
        ]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);
        if (isset($res['errcode'])) return false;

        # 写入日志
        self::add_log([
            '微信浏览器登录，使用code获取access_token',
            'Token'  => $res['access_token'],
            'OpenId' => $res['openid']
        ]);

		return $res;
    }

    /**
     * 根据凭据，更新特殊access_token
     * @todo 注意，在get_code_token()中并没有返回refresh_token参数，所以需要自行修改代码获取
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $refresh_token 在get_code_token()中的更新凭据
     * @return array|bool
    */
	public static function save_code_token($refresh_token){
        self::config();
        $url = self::str_url(self::$Config['Snsapi_SaveAcToken_Url'], [
            self::$Config['weixin_appid'],
			$refresh_token
        ]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);
        if (isset($res['errcode'])) return false;

        # 写入日志
        self::add_log([
            '微信浏览器登录，使用refresh_token更新后获取的access_token',
            'Token'  => $res['access_token'],
            'OpenId' => $res['openid']
        ]);

		return $res;
    }

    /**
     * 确认授权：使用特殊access_token去获取用户信息
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $token 特殊access_token
	 * @param string $open_id 用户的OpenId
     * @return array|bool 微信用户的基本信息
    */
	public static function get_user($token, $open_id){
        self::config();

        # 判断授权类型，如果是静默授权，就要使用普通接口，获取用户信息
		if (self::$Config['weixin_login_ype'] == 1){
			# 返回静默授权的用户信息
			return self::get_basic($open_id);
        }

        # 确认授权的获取方式
        $url = self::str_url(self::$Config['Snsapi_User_Url'], [
            $token,
			$open_id,
			self::$Config['WebMicro_Lang']
        ]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);
        if (isset($res['errcode'])) return false;
        
        # 写入日志
        self::add_log([
            '微信浏览器登录，点击授权：使用特殊actoken获取到的用户信息：',
            'return' => $json,
            'OpenId' => $open_id
        ]);

		# 返回点击授权的用户信息
		return $res;
    }
    
    /**
     * 静默授权：使用openid去获取用户信息
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $open_id 用户的OpenId
     * @return array|bool 微信用户的基本信息
    */
    public static function get_basic($open_id) {
        # 发送请求
        $token = self::get_token();
        # 使用OpenID去获取用户信息
        $url   = self::str_url(self::$Config['AppUserBasic_Url'], [$token, $open_id]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);
        if (isset($res['errcode'])) return false;

        # 写入日志
        self::add_log([
            '微信浏览器登录，静默授权：使用普通actoken获取到的用户信息：',
            'return' => $json,
            'OpenId' => $open_id
        ]);

		# 返回点击授权的用户信息
        return $res;
    }

    /**
     * 获取用户列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $open_id 第一个拉取的OPENID，不填默认从头开始拉取
     * @return array|bool
    */
	public static function get_user_list($open_id=null) {
        # 发送请求
        $token = self::get_token();
        # 使用OpenID去获取用户信息
        $url   = self::str_url(self::$Config['AppUserList_Url'], [$token, $open_id]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);

        if (isset($res['errcode'])) return false;
        return $res;
	}

    /**
     * 设置用户的备注名
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $open_id 用户的OpenId
	 * @param string $remark 设置的备注名
     * @return bool
    */
	public static function save_remark($open_id, $remark) {
        # 发送请求
        $token = self::get_token();
        # 使用OpenID去获取用户信息
        $url   = self::str_url(self::$Config['AppUserRemarks_Url'], [$token]);
        $json  = self::https_curl($url, json_encode([
            'openid' => $open_id,
            'remark' => $remark
        ]));
        $res   = json_decode($json, true);

        if ($res['errcode'] != '0') return false;
        return true;
	}

    /************************************** 以下是模板信息相关 *************************************/
    /**
     * 更改行业信息
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $str_1 所属行业编码
     * @param mixed $str_2 所属行业编码
     * @return string|bool
    */
    public static function save_industry($str_1=1, $str_2=2){
        $jsonjob = '{
					  "industry_id1":"'.$str_1.'",
					  "industry_id2":"'.$str_2.'"
                    }';
        # 发送请求
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Industry_Save_Url'], [$token]);
        $json  = self::https_curl($url, $jsonjob);
        $res   = json_decode($json, true);
        if ($res['errcode'] == 0) return true;
        return $res['errmsg'];
    }

    /**
     * 获得模板ID
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $mid 模板库中模板的编号
     * @return string|bool
    */
    public static function get_template($mid) {
        $jsonmod = '{
            "template_id_short": '.$mid.'
        }';
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Industry_Set_Url'], [$token]);
        $json  = self::https_curl($url, $jsonmod);
        $res   = json_decode($json, true);
        if ($res['errcode'] == 0) return $res['template_id'];
        return false;
    }

    /**
     * 发送消息模板
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.6 + 2018.10.16
     * @deprecated 暂不弃用
     * @global 无
     * @param string $open_id 用户的微信ID
     * @param string $mid get_template()返回的模板ID
     * @param string $url 模板消息中，需要点击跳转到的详情地址
     * @param json  $data 模板消息内容，具体格式参考微信开发文档
     * @return string|bool
    */
    public static function send_msg($open_id, $mid, $url, $data){
        $jsonmod = ' {
					   "touser":"'.$open_id.'",
					   "template_id":"'.$mid.'",
					   "url":"'.$url.'",
					   "data":'.$data.'
                   }';
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Industry_Add_Url'], [$token]);
        $json  = self::https_curl($url, $jsonmod);
        $res   = json_decode($json, true);
        if ($res['errcode'] == 0) return $res['msgid'];
        return false;
    }

    /******************************************* 菜单类 ******************************************/

    /**
     * 查询自定义菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return json
    */
    public static function get_menu(){
        # 发送请求
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Menu_Get_Url'], [$token]);
        $json  = self::https_curl($url);
        $res   = json_decode($json, true);
        if (isset($res['errcode'])) return '{}';
        return $json;
    }

    /**
     * 修改自定义菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return string|bool
    */
    public static function save_menu(){
        # 发送请求
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Menu_Add_Url'], [$token]);
        $res   = json_decode(self::https_curl($url, self::$Config['weixin_menu']), true);
        if ($res['errcode'] == 0) return true;
        return $res['errmsg'];
    }

    /**
     * 删除自定义菜单
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return bool
    */
    public static function delete_menu(){
        # 发送请求
        $token = self::get_token();
        $url   = self::str_url(self::$Config['Menu_Del_Url'], [$token]);
        $res   = json_decode(self::https_curl($url), true);
        if ($res['errcode'] == 0) return true;
        return false;
    }

    /********************************************** 自动回复类 *********************************************/
    /**
     * 获取微信交互数据
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public static function get_xml(){
        # 获得数据包的信息
        $postStr = file_get_contents("php://input");
        # 如果数据包内的信息不为空
        if (!empty($postStr)) {
            # XML文件的解析依赖libxml库,libxml_disable_entity_loader函数,是为了安全性,防止入侵者通过协议注入XML向服务器发起攻击
            libxml_disable_entity_loader(true);
            # 把XML编译成一个Class对象
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            return $postObj;
        }
        return false;
    }

    /**
     * 自动回复交互监听
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	public static function response_msg(){
        //获取XML格式的数据,返回的是一个对象
		$postObj = self::get_xml();
		if (!empty($postObj)){
			# 用户消息类型分支判定
			switch($postObj->MsgType){
				case "event":// 事件类型
					$result = self::receive_event($postObj);
					break;
				case "text":// 文本类型
					$result = self::receive_text($postObj);
					break;
				case "image" :// 图片类型
					$result = self::receive_text($postObj);
					break;
				case "voice" :// 语音类型
					$result = self::receive_text($postObj);
					break;
				case "video" :// 视频类型
					$result = self::receive_text($postObj);
					break;
				case "shortvideo" :// 小视频类型
					$result = self::receive_text($postObj);
					break;
				case "location" :// 地理位置类型
					$result = self::receive_location($postObj);
					break;
				case "link" :// 链接类型
					$result = self::receive_location($postObj);
					break;
				default :
					$result = "此项信息类型尚未开发，敬请期待...";
			}
			echo $result;
		}
    }
    
    /**
     * response_msg的子函数，处理事件类型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param obj $object xml对象
     * @return void
    */
    public static function receive_event($object){
		# $object->Event 表示用户消息的的事件类型
		switch ($object->Event){
            # subscribe（订阅）
			case "subscribe":
				# 关注后回复的欢迎语，若要修改，请查看微信公众号文档及该类封装的方法
				$content = '';
                # 文本回复
				$result = self::transmit_text($object, $content);
				/**
				 *  附加功能 ———— 带参数的二维码，关注时即静默登录/注册会员 （不用可删）
				 *  判断的内容是：获取扫描关注时二维码的参数值 （该功能为 带链接的二维码）
				 */
				if (preg_match("/^qr/i",$object->EventKey)) {
					$contentStr = explode('_',$object->EventKey);
					$tjuserid = $contentStr[1];
				} else {
					$tjuserid = 0;
				}
				# 此处是自动注册的逻辑代码，需要该功能的人可以自行添加
                break;
            # unsubscribe（取消订阅）
			case "unsubscribe":
                break;
            # click（点击菜单拉取消息的事件推送）
			case "CLICK":
				switch ($object->EventKey) {
					# 菜单中的"key"值，此处设置点击菜单的相应操作
					case "V1001_MUSIC":
						//$content = "请回复歌曲名（如:“白色恋人”），就能获取想听的歌曲";
						//$result = self::transmit_text($object, $content);
						break;
					case "V1001_DELIVERY":
						//$content = "";
						//$result = self::transmit_text($object, $content);
						break;
				}
			case "SCAN":// 扫描二维码
				# 要实现统计分析，则需要扫描事件写入数据库，这里可以记录 EventKey及用户OpenID，扫描时间
				break;
			//case "scancode_push"  "scancode_waitmsg":
			//case "pic_sysphoto"  "pic_photo_or_album" "pic_weixin":
			//case "location_select":
			default:
				break;
		}
		return $result;
    }

    /**
     * 
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param obj $object xml对象
     * @return void
    */
    public static function receive_text($object){
        # 暂无代码
    }
    
    /**
     * response_msg的子函数，处理事件类型
     * @todo 收到地理位置和链接的操作->文本形式回复
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param obj $object xml对象
     * @return void
    */
    public function receive_location($object){
        switch ($object->MsgType){
            # 地理位置类型
            case "location":
                $content = "";
                break;
            # 链接类型
            case "link":
                $content = "";
                break;
        }
        # 文本回复
        $result = self::transmit_text($object, $content);
        return $result;
    }

    /***************************************** 以下方法是公众号回复形式 *************************************/

    /**
     * 文本形式回复
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmit_text($object, $content=null){
        //构建XML格式文本  CDATA表示不转义； %s 表示数据类型；*** <FuncFlag>0</FuncFlag>  Funcflag 表示是否是星标微信,暂时不保留***
        $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
					</xml>";

        $msgType = "text";
        $result = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $msgType, $content);
        return $result;
    }

    /**
     * 图片形式回复
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmit_image($object, $media_id=null){
        $imageTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Image>
							<MediaId><![CDATA[media_id]]></MediaId>
						</Image>
					</xml>";

        $msgType = "image";
        $result = sprintf($imageTpl, $object->FromUserName, $object->ToUserName, time(), $msgType, $media_id);
        return $result;
    }

    /**
     * 语音形式回复
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmit_voice($object, $media_id=null){
        $voiceTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Voice>
							<MediaId><![CDATA[media_id]]></MediaId>
						</Voice>
					</xml>";

        $msgType = "voice";
        $result = sprintf($voiceTpl, $object->FromUserName, $object->ToUserName, time(), $msgType, $media_id);
        return $result;
    }

    /**
     * 视频形式回复
     * @todo $videoArray是一个数组数据
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmit_video($object, $videoArray){
        $videoTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Video>
							<MediaId><![CDATA[media_id]]></MediaId>
							<Title><![CDATA[title]]></Title>
							<Description><![CDATA[description]]></Description>
						</Video>
					</xml>";

        $msgType = "video";
        $result = sprintf($videoTpl, $object->FromUserName, $object->ToUserName, time(), $msgType);
        return $result;
    }

    /**
     * 音乐形式回复
     * @todo $musicArray是一个数组数据
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmit_music($object, $musicArray){
        $musicTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Music>
							<Title><![CDATA[南山南]]></Title>
							<Description><![CDATA[马頔]]></Description>
							<MusicUrl><![CDATA[http://weiyanweiyan.duapp-preview.com/music/1.mp3]]></MusicUrl>
							<HQMusicUrl><![CDATA[http://weiyanweiyan.duapp-preview.com/music/1.mp3]]></HQMusicUrl>
						</Music>
					</xml>";

        $msgType = "music";
        $result = sprintf($musicTpl, $object->FromUserName, $object->ToUserName, time(), $msgType);
        return $result;
    }

    /**
     * 图文形式回复
     * @todo $newsArray是一个数组数据
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return xml
    */
    public static function transmitNews($object, $newsArray){
        $newsTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>2</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[title1]]></Title>
								<Description><![CDATA[description1]]></Description>
								<PicUrl><![CDATA[picurl]]></PicUrl>
								<Url><![CDATA[url]]></Url>
							</item>
						</Articles>
					</xml>";

        $msgType = "news";
        $result = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), $msgType);
        return $result;
    }


    /************************************************ 工具类 ***********************************************/

    /**
     * 更新Access_Token(会更改缓存)
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
	private static function save_token(){
        self::config();
		# 请求ToKen
		$res    = self::https_curl(self::str_url(self::$Config['AppToken_Url'], [
			self::$Config['weixin_appid'],
			self::$Config['weixin_appsecret']
        ]));
		# 接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
		$result = json_decode($res, true);
        # 写入缓存文件
		$info = file_put_contents(self::$Config['AC_Token_Name'], json_encode([
			'access_token' => $result['access_token'],                    // Access_Token
			'time'         => time()+self::$Config['weixin_actoken_time'] // 过期时间
        ]));
		return $result['access_token'];
    }

    /**
     * 验证access_token有效期
     * @todo 有效则返回最新一条access_token，没则更新
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return string
    */
	private static function get_token(){
        self::config();
		# 如果删除了缓存，则重新建立
		if (!file_exists(self::$Config['AC_Token_Name'])) {
			return self::save_token();
		}
		# 获取缓存中的access_token
		$body = file_get_contents(self::$Config['AC_Token_Name']);
		# 先转回数组
        $result = json_decode($body, true);
        
        # 如何缓存超过有效期，则重新建立
		if (empty($result) || time() >= $result['time']+self::$Config['weixin_actoken_time']){
			return self::save_token();
		}
		# 否则返回缓存token
		return $result['access_token'];
	}

    /**
     * 将参数植入占位符
     * @todo 占位符为%s%
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 占位字符串
     * @param array $array 参数是一维数组，参数需要自行按照占位符排序排列
     * @return string 格式化后的字符串
    */
	private static function str_url($url, $array){
		# 循环替换占位内容
		foreach ($array as $v){
			$url = preg_replace('/%s%/', $v, $url, 1);
		}
		return $url;
    }

    /**
     * 对于微信支付金额进行小数转换
     * @todo 单位是 分
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param string $money 金额
     * @return void 返回转换后的金额
    */
	private static function money($money){
		if(floor($money) != $money){
            # 只保留2位小数，并且不做四舍五入
            $money = sprintf("%.2f",substr(sprintf("%.3f", $money), 0, -1));
            # 删除小数点
			$money = str_replace('.', '', $money);
		}
		return $money;
	}

    /**
     * 微信接口数据传输的万能函数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 请求地址
     * @param mixed $data 请求参数，默认为空
     * @return mixed 请求返回内容
    */
	private static function https_curl($url, $data = null){
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
    }

    /**
     * 写入错误日志
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @param array $arr_title  一个一维数组自定义内容
	 * @param bool $arr_error 是否插入系统错误信息
	 * @param string $file 日志名
     * @return void
    */
	public static function add_log($arr_title, $arr_error=false, $file='error_log.log'){
        self::config();
        # 状态3关闭日志写入
        if (self::$Config['weixin_debug'] == 3) return false;
        # 不是数组中断程序
        if (!is_array($arr_title)) return false;
        
        # 创建日志目录
		if (!file_exists(self::$Config['DeBugList'])) {
			@mkdir(self::$Config['DeBugList'], 0777);
        }

        # 状态1清空日志后再写入
        if (self::$Config['weixin_debug'] == 1) {
            if (file_exists(self::$Config['DeBugList'] . $file)) {
                unlink(self::$Config['DeBugList'] . $file);
            }
        }
        
		# 定义一个空的变量,用于存放日志TXT实体
		$error_txt = "自定义信息如下(". date('Y-m-d H:m:s', time()) .")：".PHP_EOL;
		# 解析自定义日志内容
		foreach ($arr_title as $key=>$val){
			$error_txt .= $key.'：'.$val.PHP_EOL;
		}

		# 判断系统错误显示是否开启
		if ($arr_error === true) {
			# 获取刚发生的错误信息，并返回数组，无错返回null
			$arr_error = error_get_last();
			# 不为空则执行错误解析
			if (isset($arr_error)) {
				$error_txt .= "系统错误信息如下：".PHP_EOL;
				# 解析$arr_error 系统错误信息
				foreach ($arr_title as $key=>$val){
					$error_txt .= $key.'：'.$val.PHP_EOL;
				}
			}
		}
		# 最后再写入两个换行符,以便追加查看
		$error_txt .= PHP_EOL.PHP_EOL;
		# 最后写入日志
		error_log($error_txt, 3, self::$Config['DeBugList'].$file);
    }
    
    /************************************ 以下涉及微信支付，官方的SDK代码 *******************************/

    /**
     *
     * 通过跳转获取用户的openid，跳转流程如下：
     * 1、设置自己需要调回的url及其其他参数，跳转到微信服务器https://open.weixin.qq.com/connect/oauth2/authorize
     * 2、微信服务处理完成之后会跳转回用户redirect_uri地址，此时会带上一些参数，如：code
     *
     * @return 用户的openid
     */
    public static function GetOpenid() {
        //通过code获得openid
        if (!isset($_GET['code'])){
            //触发微信返回code码
            $baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']);
            $url = self::__CreateOauthUrlForCode($baseUrl);
            Header("Location: $url");
            exit();
        } else {
            //获取code码，以获取openid
            $code = $_GET['code'];
            $openid = self::getOpenidFromMp($code);
            return $openid;
        }
    }

    /**
     *
     * 获取jsapi支付的参数
     * @param array $UnifiedOrderResult 统一支付接口返回的数据
     * @throws WxPayException
     *
     * @return json数据，可直接填入js函数作为参数
     */
    public static function GetJsApiParameters($UnifiedOrderResult) {
        if(!array_key_exists("appid", $UnifiedOrderResult)
            || !array_key_exists("prepay_id", $UnifiedOrderResult)
            || $UnifiedOrderResult['prepay_id'] == "")
        {
            throw new WxPayException("参数错误");
        }
        $jsapi = new WxPayJsApiPay();
        $jsapi->SetAppid($UnifiedOrderResult["appid"]);
        $timeStamp = time();
        $jsapi->SetTimeStamp("$timeStamp");
        $jsapi->SetNonceStr(WxPayApi::getNonceStr());
        $jsapi->SetPackage("prepay_id=" . $UnifiedOrderResult['prepay_id']);
        $jsapi->SetSignType("MD5");
        $jsapi->SetPaySign($jsapi->MakeSign());
        $parameters = json_encode($jsapi->GetValues());
        return $parameters;
    }

    /**
     *
     * 通过code从工作平台获取openid机器access_token
     * @param string $code 微信跳转回来带上的code
     *
     * @return openid
     */
    public static function GetOpenidFromMp($code) {
        $url = self::__CreateOauthUrlForOpenid($code);
        WxPayConfig::Config();
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if(WxPayConfig::$CURL_PROXY_HOST != "0.0.0.0"
            && WxPayConfig::$CURL_PROXY_PORT != 0){
            curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::$CURL_PROXY_HOST);
            curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::$CURL_PROXY_PORT);
        }
        //运行curl，结果以jason形式返回
        $res = curl_exec($ch);
        curl_close($ch);
        //取出openid
        $data = json_decode($res,true);
        self::$data = $data;
        $openid = $data['openid'];
        return $openid;
    }

    /**
     *
     * 拼接签名字符串
     * @param array $urlObj
     *
     * @return 返回已经拼接好的字符串
     */
    private static function ToUrlParams($urlObj) {
        $buff = "";
        foreach ($urlObj as $k => $v)
        {
            if($k != "sign"){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }
    /**
	 * 
	 * 微信支付参数数组转换为url参数
	 * @param array $urlObj
	 */
	private static function PayToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			$buff .= $k . "=" . $v . "&";
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}

    /**
     *
     * 获取地址js参数
     *
     * @return 获取共享收货地址js函数需要的参数，json格式可以直接做参数使用
     */
    public static function GetEditAddressParameters() {
        WxPayConfig::Config();
        $getData = self::$data;
        $data = array();
        $data["appid"] = WxPayConfig::$APPID;
        $data["url"] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $time = time();
        $data["timestamp"] = "$time";
        $data["noncestr"] = "1234568";
        $data["accesstoken"] = $getData["access_token"];
        ksort($data);
        $params = self::ToUrlParams($data);
        $addrSign = sha1($params);

        $afterData = array(
            "addrSign" => $addrSign,
            "signType" => "sha1",
            "scope" => "jsapi_address",
            "appId" => WxPayConfig::$APPID,
            "timeStamp" => $data["timestamp"],
            "nonceStr" => $data["noncestr"]
        );
        $parameters = json_encode($afterData);
        return $parameters;
    }

    /**
     *
     * 构造获取code的url连接
     * @param string $redirectUrl 微信服务器回跳的url，需要url编码
     *
     * @return 返回构造好的url
     */
    private static function __CreateOauthUrlForCode($redirectUrl) {
        WxPayConfig::Config();
        $urlObj["appid"] = WxPayConfig::$APPID;
        $urlObj["redirect_uri"] = "$redirectUrl";
        $urlObj["response_type"] = "code";
        $urlObj["scope"] = "snsapi_base";
        $urlObj["state"] = "STATE"."#wechat_redirect";
        $bizString = self::ToUrlParams($urlObj);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
    }

    /**
     *
     * 构造获取open和access_toke的url地址
     * @param string $code，微信跳转带回的code
     *
     * @return 请求的url
     */
    private static function __CreateOauthUrlForOpenid($code) {
        WxPayConfig::Config();
        $urlObj["appid"] = WxPayConfig::$APPID;
        $urlObj["secret"] = WxPayConfig::$APPSECRET;
        $urlObj["code"] = $code;
        $urlObj["grant_type"] = "authorization_code";
        $bizString = self::ToUrlParams($urlObj);
        return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
    }
}