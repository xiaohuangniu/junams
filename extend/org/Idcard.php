<?php
// +----------------------------------------------------------------------
// | 居民身份证真实性查询API
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Idcard{

    /**
     * 执行查询
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $id_card 身份证号
     * @return array 查询结果
    */
    public static function run($id_card=''){
        if (empty($id_card)) return false;
        if (!self::cardeVif($id_card)) return false;

        $data   = [];
        $html   = self::https_request('http://qq.ip138.com/idsearch/index.asp?action=idcard&userid='.$id_card);
        $html   = iconv('GB2312//IGNORE','UTF-8',$html);

        $array  = explode('<table width="100%">', $html); 
        $array  = explode('</table>', $array[1]);
        $top    = strip_tags($array[0]);
        $top    = str_replace(["\r\n",'性&nbsp;&nbsp;&nbsp;&nbsp;别：', '出生日期', '发&nbsp;证&nbsp;地', '部分'], ['','','','',"\r\n"], $top);
        $array  = explode("\r\n", $top);
        $arr    = explode("：", $array[0]);
        
        $region = array_values(array_filter(explode(' ', $arr[2])));
        $data['card'] = $id_card;
        if (count($region) == 3) {
            $data['province'] = $region[0];
            $data['city']     = $region[1];
            $data['area'] = $region[2]; 
        } else {
            $data['province'] = $region[0];
            $data['city']     = $region[0];
            $data['area'] = $region[1]; 
        }
        $data['date']  = $arr[1];
        $date = date_parse_from_format('Y年m月d日', $data['date']);
        $time = mktime(0,0,0, $date['month'], $date['day'], $date['year']);
        $data['time']  = $time;
        $data['month'] = $date['month'];
        $data['day']   = $date['day'];
        $data['sex']   = $arr[0];

        return $data;
    }

    /**
     * 身份证合法性验证
     * @todo 无
     * @author 小黄牛
     * @version v1.1.1 + 2018.12.24
     * @deprecated 暂不弃用
     * @global 无
     * @param string $id_card 身份证号
     * @return boole
    */
    protected static function cardeVif($id_card){ 
        $id = strtoupper($id_card); 
        $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/"; 
        $arr_split = array(); 
        if (!preg_match($regx, $id)) return false;
        # 检查15位 
        if (15 == strlen($id)) { 
            $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/"; 
            @preg_match($regx, $id, $arr_split); 

            # 检查生日日期是否正确 
            $dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 
            if(!strtotime($dtm_birth)) return false;
            return true;
        # 检查18位 
        } else { 
            $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/"; 
            @preg_match($regx, $id, $arr_split); 
            $dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 

            # 检查生日日期是否正确 
            if (!strtotime($dtm_birth)) return false;

            # 检验18位身份证的校验码是否正确。 
            # 校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。 
        
            $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
            $arr_ch  = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
            $sign    = 0; 
            for ( $i = 0; $i < 17; $i++ ) { 
                $b = (int) $id{$i}; 
                $w = $arr_int[$i]; 
                $sign += $b * $w; 
            } 
            $n       = $sign % 11; 
            $val_num = $arr_ch[$n]; 
            if ($val_num != substr($id,17, 1)) return false;
            return true;
        }
    } 

    /**
     * 发送CURL请求
     * @param string $url  请求网址
     * @param array  $data 请求内容
     * @return 抓取内容
     */
    protected static function https_request($url, $data = null){
		$curl = curl_init();  
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1); 
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		$response = curl_exec($curl);
		curl_close($curl); 
		
		return $response;
	}
}