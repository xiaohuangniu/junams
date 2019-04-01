<?php
// +----------------------------------------------------------------------
// | 微信开发的相关URL配置
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace weixin\Weixin;
use think\Db;

class Wxconfig {

    /**
     * 获取微信URL配置
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.4 + 2018.10.11
     * @deprecated 暂不弃用
     * @global 无
     * @return string|bool
    */
    public static function get() {
        return [
            # 日志文件保存路径
            'DeBugList'                => ROOT_PATH.'public'.DS.'weixin_log'.DS,
            'AC_Token_Name'            => ROOT_PATH.'extend'.DS.'weixin'.DS.'access_token.json',// 普通 actoken保存的缓存文件名
            'WebMicro_Lang'            => 'zh_CN',// 用户信息返回结果语言版本 zh_CN 简体，zh_TW 繁体，en 英语
            
            /***************************************************************  所有API请求地址汇总  *************************************************************************/
            # 微信获取 普通 actoken的请求地址
            'AppToken_Url' => 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s%&secret=%s%',
            # 获取微信服务器IP地址
            'AppTokenCheck_Url' => 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=%s%',
            # 通过OpenID来获取用户基本信息（包括UnionID机制）
            'AppUserBasic_Url' => 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s%&openid=%s%',
            # 通过OpenID设置用户备注名
            'AppUserRemarks_Url' => 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=%s%',
            # 通过OpenId获取用户列表
            'AppUserList_Url' => 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=%s%&next_openid=%s%',
            # 点击授权的生成链接 state参数虽然为可选，但还是建议必填
            'Snsapi_Url' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s%&redirect_uri=%s%&response_type=code&scope=%s%&state=%s%#wechat_redirect',
            # 用授权后获得code去换取特殊的Access_Token
            'Snsapi_AcToken_Url' => 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s%&secret=%s%&code=%s%&grant_type=authorization_code',
            # 使用refresh_token更新特殊的Access_Token
            'Snsapi_SaveAcToken_Url' => 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=%s%&grant_type=refresh_token&refresh_token=%s%',
            # 使用特殊的Access_Token去获取用户信息
            'Snsapi_User_Url' => 'https://api.weixin.qq.com/sns/userinfo?access_token=%s%&openid=%s%&lang=%s%',
            # 长链接转短链接接口
            'Short_Url' => 'https://api.weixin.qq.com/cgi-bin/shorturl?access_token=%s%',
        
            /********************************** 微信自定义菜单相关 *******************************/
            # 创建菜单
            'Menu_Add_Url' => 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s%',
            # 删除菜单
            'Menu_Del_Url' => 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=%s%',
            # 查询菜单
            'Menu_Get_Url' => 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=%s%',
            # 查询菜单(包括菜单配置)
            'Menu_GetList_Url' => 'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=%s%',
        
            /********************************** 模板信息相关 *******************************/
            # 更改行业
            'Industry_Save_Url' => 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token=%s%',
            # 选择模板
            'Industry_Set_Url' => 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=%s%',
            # 发送模板信息
            'Industry_Add_Url' => 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=%s%',
        
            /********************************** 二维码相关 *******************************/
            # 创建二维码的ticket
            'Qrcode_Add_Url' => 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=%s%',
            # 使用ticket去换取二维码
            'Qrcode_Get_Url' => 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=%s%',
        
            /******************************* 微信支付相关 ******************************/
            # 扫码模式一 生成二维码地址
            'ScanCode_One_Url' => 'weixin：//wxpay/bizpayurl?sign=%s%&appid=%s%&mch_id=%s%&product_id=%s%&time_stamp=%s%&nonce_str=%%',
        ];
    }

}