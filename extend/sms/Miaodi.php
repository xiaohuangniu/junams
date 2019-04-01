<?php
// +----------------------------------------------------------------------
// | 秒嘀短信发送
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace sms;
use think\Db;

class Miaodi {
    /**
     * 万能CURL函数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 请求地址
     * @param array $data 请求内容
     * @return void
    */
    private function https_request($url, $data = null){
        # 初始化一个cURL会话
        $curl = curl_init();  
        
        //设置请求选项, 包括具体的url
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  //禁用后cURL将终止从服务端进行验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);  //设置为post请求类型
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  //设置具体的post数据
        }
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
        $response = curl_exec($curl);  //执行一个cURL会话并且获取相关回复
        curl_close($curl);  //释放cURL句柄,关闭一个cURL会话
        
        return $response;
    }

    /**
     * 调用发送接口
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @param string $phone 接收短信手机号集合,多个用逗号分隔
     * @param mixed $param 短信变量内容，就是你短信模板里的{}，多个用,逗号隔开
     * @return string|bool
    */
    public function run($phone, $param) {
        $info = Db::name('config')->field('miaodi_account_sid,miaodi_template_id,miaodi_auth_token')->where('id',1)->find();
        # 请求地址
        $ApiUrl = 'https://api.miaodiyun.com/20150822/industrySMS/sendSMS';
        # 提交内容
        $data = [
            # ACCOUNT_SID
            'accountSid' => $info['miaodi_account_sid'],
            # 短信模板ID
            'templateid' => $info['miaodi_template_id'],
            # 短信变量内容，就是你短信模板里的{}，多个用,逗号隔开
            'param'      => $param,
            # 接收短信手机号集合,多个用逗号分隔
            'to'         => $phone,
            # 当前系统时间戳-格式固定不能改
            'timestamp'  => date("YmdHis",time()),
            # 返回格式
            'respDataType' => 'JSON',
        ];
        # 签名MD5(ACCOUNT SID + AUTH TOKEN + timestamp)。共32位（小写）。
        $data['sig'] = md5($data['accountSid'] .$info['miaodi_auth_token']. $data['timestamp']);
        # 发送请求
        $str = $this->https_request($ApiUrl, $data);
        $res = json_decode($str, true);
        # 返回值
        if ($res['respCode'] == '00000') {return true;}
        return $res['respDesc'];
    }
}