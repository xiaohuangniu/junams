<?php
// +----------------------------------------------------------------------
// | 不基于反射机制：实现注释生成文档
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Fileroot {
    private $_wordGroup = [
        '@author'     => '作者',
        '@version'    => '版本',
        '@deprecated' => '废弃说明',
        '@global'     => '全局变量',
        '@todo'       => '优化建议',
        '@param'      => '参数',
        '@return'     => '返回值',
    ];

    /**
     * 获得文件说明
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @param string $dir 目录地址
     * @return array
    */
    public function run($dir) {
        if(!is_dir($dir)) return false;
        $handle = opendir($dir);
        $array  = [];
        if($handle){
            while (($fl = readdir($handle)) !== false) {
                $temp = $dir.$fl;
                if (!is_dir($temp) && $fl!='.' && $fl != '..') {
                    $className = str_replace('.php', '', $fl);
                    $data['name']  = $className;
                    $data['url']   = $temp;
                    $data['title'] = $this->getLine($temp, 3);
                    $data['auth']  = $this->getLine($temp, 9);
                    $array[] = $data;
                }
            }
        }
        return $array;
    }

    /**
     * 获得文件对应的函数列表
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 目录地址
     * @return array
    */
    public function getList($url) {
        $content = file_get_contents($url);
        $reg1 = "/(\/\*{2})([\s\S]*)(})/U";
        preg_match_all($reg1, $content, $array);
        $data = [];
        foreach ($array as $v) {
            foreach ($v as $key=>$val) {
                if ($val != '}' && $val != '/**') {
                    $str = str_replace('/**', '', $val);
                    $A = explode('*/',$str);
                    $B = explode('* ', $A[0]);
                    unset($B[0]);
                    foreach ($B as $k=>$V) {
                        foreach ($this->_wordGroup as $kk=>$vv) {
                            if (strrpos($V, $kk) !== false) {
                                $name = str_replace('@', '', $kk);
                                $word = str_replace("$kk ", '', $V);
        
                                # 对一些标记元做特殊处理
                                if (strrpos($V, '@param') !== false) {
                                    $array = array_filter(explode(' ', $word));
                                    sort($array);
                                    $data[$key][$name][$k] = $array;
                                } else {
                                    $data[$key][$name]= $word;
                                }
                            } else {
                                if ($k == 0) {
                                    $data[$key]['title'] = $V;
                                } else if ($k == 1) {
                                    if (strrpos($V, '@') === false) {
                                        $data[$key]['des'] = $V;
                                    } else {
                                        $data[$key]['des'] = '';
                                    }
                                    
                                }
                            }
                        }
                    }

                    $C = explode('{', $A[1]);
                    $C = $C[0];
                    
                    if (strrpos($C, 'private') !== false) { $data[$key]['auth'] = '私有'; }
                    else if (strrpos($C, 'protected') !== false) { $data[$key]['auth'] = '继承'; }
                    else { $data[$key]['auth'] = '公共'; }

                    if (strrpos($C, 'static') !== false) { $data[$key]['static'] = '静态'; }
                    else { $data[$key]['static'] = '动态'; }

                    $name = explode('function ', $C);
                    $name = explode('(', $name[1]);
                    $data[$key]['class'] = $name[0];
                }
            }
            
        }
        return $data;
    }

    /**
     * 获得指定函数的详情
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.08
     * @deprecated 暂不弃用
     * @global 无
     * @param string $url 目录地址
     * @param string $class 函数名
     * @return void
    */
    public function getContent($url, $class) {
        $list = $this->getList($url);
        foreach ($list as $v) {
            if ($v['class'] == $class) {
                return $v;
            }
        }
        return [];
    }

    /**
    * 获取指定行内容
    * @todo 无
    * @author 小黄牛
    * @version v1.0.0.1 + 2018.10.08
    * @deprecated 暂不弃用
    * @global 无
    * @param string $file 文件路径
    * @param int $line 行数
    * @param int $length 指定行返回内容长度
    * @return string
    */
    private function getLine($file, $line, $length = 4096){
        $returnTxt = null;                // 初始化返回
        $i         = 1;                   // 行数
        $handle    = @fopen($file, "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, $length);
                if($line == $i) $returnTxt = str_replace(['// | ', 'Author: ', '<', '>'], '', $buffer);
                $i++;
            }
            fclose($handle);
        }
        return $returnTxt;
    }
}
