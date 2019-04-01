<?php
// +----------------------------------------------------------------------
// | Bom头检测与清除
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Bom {
    private $txt = ''; // 日志记录
    private $type;     // 类型

    /**
     * 开始执行
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @param bool $type 类型 false|true 只检测|只清除
     * @return array
    */
    public function run($type=false) {
        $this->type = $type;
        # 执行检测
        $this->checkdir();
        if ($type) {
            return true;
        }
        return $this->txt;
    }

    /**
     * 遍历整个项目是否包含BOM头
     * @todo 该类用于递归
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @param string $basedir 递归目录地址
     * @return void
    */
    private function checkdir($basedir=null) {
        $basedir = empty($basedir)?'.':$basedir;
        if ($dh = opendir($basedir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    if (!is_dir($basedir.'/'.$file)) {
                        $path = self::checkBOM($basedir.'/'.$file);
                        if ($path) {
                            $this->txt .= '<div style="padding:2px 10px">文件: '.$basedir.'/'.$file .$path.'</div>';
                        }
                    } else {
                        $dirname = $basedir.'/'.$file;
                        $this->checkdir($dirname);
                    }
                }
            }
            closedir($dh);
        }
    }

    /**
     * 清除bom头
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.5 + 2018.10.12
     * @deprecated 暂不弃用
     * @global 无
     * @param string $filename bom文件地址
     * @return string|bool
    */
    private function checkBOM($filename) {
        $contents   = file_get_contents($filename);
        $charset[1] = substr($contents,0,1);
        $charset[2] = substr($contents,1,1);
        $charset[3] = substr($contents,2,1);
        if (ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191) {
            if ($this->type) {
                $rest = substr($contents, 3);
                $filenum = fopen($filename,'w');
                flock($filenum, LOCK_EX);
                fwrite($filenum, $rest);
                fclose($filenum);
                return false;
            }
            return ' <font color=red>找到BOM</font>';
        }
        return false;
    }
}
