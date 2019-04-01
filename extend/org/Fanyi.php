<?php
// +----------------------------------------------------------------------
// | 百度翻译API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Fanyi {
    
    /**
     * 开始翻译，默认英文
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $query 查询语句
     * @param string $to 目标语种
     * @return string 翻译结果
    */
    public static function run($query = '', $to = '英语') {
        $txt = '';
        foreach ($query as $v) {
            $txt .= "\n".$v;
        }

        $from = self::langdetect($query);
        $to   = self::Language($to);
        $res  = json_decode(self::post('https://fanyi.baidu.com/basetrans', [
            'query' => $txt,
            'from'  => $from,
            'to'    => $to,
        ], 'Android'), true);
        if ($res['errno'] != 0) return false;
        return $res['trans'];
    }

    /**
     * 语言编码转换
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $name 中文
     * @return string
    */
    protected static function Language($name){
        $Lang = [
            'zh'    => '中文',
            'jp'    => '日语',
            'jpka'  => '日语假名',
            'th'    => '泰语',
            'fra'   => '法语',
            'en'    => '英语',
            'spa'   => '西班牙语',
            'kor'   => '韩语',
            'tr'    => '土耳其语',
            'vie'   => '越南语',
            'ms'    => '马来语',
            'de'    => '德语',
            'ru'    => '俄语',
            'ir'    => '伊朗语',
            'ara'   => '阿拉伯语',
            'est'   => '爱沙尼亚语',
            'be'    => '白俄罗斯语',
            'bul'   => '保加利亚语',
            'hi'    => '印地语',
            'is'    => '冰岛语',
            'pl'    => '波兰语',
            'fa'    => '波斯语',
            'dan'   => '丹麦语',
            'tl'    => '菲律宾语',
            'fin'   => '芬兰语',
            'nl'    => '荷兰语',
            'ca'    => '加泰罗尼亚语',
            'cs'    => '捷克语',
            'hr'    => '克罗地亚语',
            'lv'    => '拉脱维亚语',
            'lt'    => '立陶宛语',
            'rom'   => '罗马尼亚语',
            'af'    => '南非语',
            'no'    => '挪威语',
            'pt_BR' => '巴西语',
            'pt'    => '葡萄牙语',
            'swe'   => '瑞典语',
            'sr'    => '塞尔维亚语',
            'eo'    => '世界语',
            'sk'    => '斯洛伐克语',
            'slo'   => '斯洛文尼亚语',
            'sw'    => '斯瓦希里语',
            'uk'    => '乌克兰语',
            'iw'    => '希伯来语',
            'el'    => '希腊语',
            'hu'    => '匈牙利语',
            'hy'    => '亚美尼亚语',
            'it'    => '意大利语',
            'id'    => '印尼语',
            'sq'    => '阿尔巴尼亚语',
            'am'    => '阿姆哈拉语',
            'as'    => '阿萨姆语',
            'az'    => '阿塞拜疆语',
            'eu'    => '巴斯克语',
            'bn'    => '孟加拉语',
            'bs'    => '波斯尼亚语',
            'gl'    => '加利西亚语',
            'ka'    => '格鲁吉亚语',
            'gu'    => '古吉拉特语',
            'ha'    => '豪萨语',
            'ig'    => '伊博语',
            'iu'    => '因纽特语',
            'ga'    => '爱尔兰语',
            'zu'    => '祖鲁语',
            'kn'    => '卡纳达语',
            'kk'    => '哈萨克语',
            'ky'    => '吉尔吉斯语',
            'lb'    => '卢森堡语',
            'mk'    => '马其顿语',
            'mt'    => '马耳他语',
            'mi'    => '毛利语',
            'mr'    => '马拉提语',
            'ne'    => '尼泊尔语',
            'or'    => '奥利亚语',
            'pa'    => '旁遮普语',
            'qu'    => '凯楚亚语',
            'tn'    => '塞茨瓦纳语',
            'si'    => '僧加罗语',
            'ta'    => '泰米尔语',
            'tt'    => '塔塔尔语',
            'te'    => '泰卢固语',
            'ur'    => '乌尔都语',
            'uz'    => '乌兹别克语',
            'cy'    => '威尔士语',
            'yo'    => '约鲁巴语',
            'yue'   => '粤语',
            'wyw'   => '文言文',
            'cht'   => '中文繁体'
        ];

        foreach ($Lang as $k=>$v) {
            if ($v == $name) return $k;
        }
        return $name;
    }

    /**
     * 使用POST发送数据
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 目标地址
     * @param array  $data 发送数据
     * @param string $ua 用户代理
     * @return string 响应数据
    */
    protected static function post($url = '', $data = [], $ua = '') {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POSTFIELDS     => $data,
            CURLOPT_USERAGENT      => $ua,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        return curl_exec($ch);
    }

    /**
     * 调用百度接口，判断语种
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $query 内容
     * @return string 语种
    */
    protected static function langdetect($query) {
        foreach ($query as $v) {
            $v = trim(substr($v, 0, 50));
            if ($v) {
                return json_decode(self::post('https://fanyi.baidu.com/langdetect', [
                    'query' => $v,
                ]))->lan;
            }
        }
    }
}