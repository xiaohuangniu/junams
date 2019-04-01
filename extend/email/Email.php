<?php
// +----------------------------------------------------------------------
// | ThinkMIMI - 邮件发送
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://xiuxian.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace email;
use think\Db;
use email\mail\Phpmailer;

class Email {
    
    /**
     * 发送邮件
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.09
     * @deprecated 暂不弃用
     * @global 无
     * @param string $email 邮件人邮箱，多个使用,逗号隔开
     * @param string $title 邮件标题
     * @param string $html 邮件内容
     * @return string|bool
    */
    public static function run($email, $title, $html) {
        $info = Db::name('config')->field('email_name,email_pwd,email_host,email_charset,email_port')->where('id',1)->find();
        # 邮箱内容 $html
        # 发送者邮箱账号(推荐163)
        $send_email = $info['email_name'];
        # 实例化邮件类
        $mail = new Phpmailer();
        # 使用SMTP发送方式
        $mail->IsSMTP();
        # 运用的邮箱服务商域名
        $mail->Host     = $info['email_host'];
        # 字符串编码
        $mail->CharSet  = $info['email_charset'];
        # 启用SMTP验证功能
        $mail->SMTPAuth = true;
        # 发送者用户名
        $mail->Username = $send_email; 
        # 发送者密码
        $mail->Password = $info['email_pwd'];
        # 邮箱端口号，现在都是用的465
        $mail->Port     = $info['email_port'];
        # 发送者email地址
        $mail->From     = $send_email;
        $mail->FromName = '';
        # 你要发给谁，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        $mail->AddAddress($email, '');
        # 使用HTML格式
        $mail->IsHTML(true);
        # 邮件标题
        $mail->Subject = $title;
        # 邮件内容
        $mail->Body = $html;
        # 附加信息，可以省略
        $mail->AltBody = '';

        # 注意，如果你在本来运行的话，会出现SMTP Error: Could not connect to SMTP host.的报错，需要放到自己的服务器上去运行
        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }
}

