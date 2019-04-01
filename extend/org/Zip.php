<?php
// +----------------------------------------------------------------------
// | 压缩解压工具类
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace org;

class Zip {
	private $file_count  = 0;   //目录深度
	private $datastr_len = 0;   //压缩包大小
	private $dirstr_len  = 0;   //目录大小
	private $gzfilename  = '';  //压缩包文件名
	private $ziptype     = '';  //压缩包格式
    private $fp;                //压缩包写入权限
    private $dirstr      = '';  //目录信息
    private $Array       = '';  //文件目录信息
	private $filefilters = [];
	private $Pakc; 
	
	/**
	 * 创建压缩文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $SavePath 压缩包保存到的路径
	 * @param string $Pack 需要打包的目录或文件 
	 * @param string $SaveName 压缩包保存的文件名   默认为空,为空时则使用时间戳充当为文件名,禁止使用中文
	 * @param string $ZipType 压缩包保存的类型      默认为zip
	 * @return void
	*/
	public function save_zip($SavePath, $Pakc, $SaveName='', $ZipType='zip') {
		# 1、判断压缩包保存是否自定义文件名
		if (empty($SaveName)) {
			$ZipSaveName = time();                               // 使用时间戳当做压缩包保存的文件名 
			$Path        = $ZipSaveName.'.'.$ZipType;  // 拼接保存路径
		} else {
			$ZipSaveName = $SaveName;
			$Path        = $ZipSaveName.'.'.$ZipType;  // 拼接保存路径
			if (is_file($Path)) {
				return false;
			}
		}
		$this->gzfilename = $Path;
		
		# 2、判断打包路径中是否带有文件名
		$Path = ltrim($Pakc,'.');
		$this->Pakc = $Pakc;
		# 找不到.号则为目录打包
		if (is_dir($Pakc)) {
			# 4、先生成空的压缩包,返回写入权限
			$SetFile = $this->SetFile();
			if($SetFile === false) return false;
			# 将路径分割
			$this->ListFile($Pakc);
			$Path = explode('|',rtrim($this->Array,'|'));
			# 删除压缩包的索引
			unset($Path[array_search($this->gzfilename,$Path)]);
			foreach ($Path as $value) {
				# 向压缩包里加入内容
				$res = $this->AddFile($value);
				if ($res === false) return false;
			}
		} else {
			# 3、判断压缩文件是否存在
			if (!is_file($Pakc)) return false;
			# 4、先生成空的压缩包,返回写入权限
			$SetFile = $this->SetFile();
			if ($SetFile === false) return false;
			$res = $this->AddFile($Pakc);
			if ($res === false) return false;
		}

		$this->createfile();

		return true;
	}

	/**
	 * 解压文件到指定目录
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $src_file zip压缩文件的路径	
	 * @param string $dest_dir 解压文件的目的路径	
	 * @param bool $overwrite 是否重写已经存在的文件
	 * @param bool $type 是否需要删除压缩包	
	 * @return bool
	*/
	public function un_zip($src_file, $dest_dir='', $overwrite=true, $type=false) {
	    if ($zip = zip_open($src_file)) {
			if ($zip){
				$splitter = '/';      
				# 如果不存在 创建目标解压目录            
				$this->create_dirs($dest_dir);             
				# 对每个文件进行解压             
				while ($zip_entry = zip_read($zip)) {				
					$pos_last_slash = strrpos(zip_entry_name($zip_entry), "/");					
					if ($pos_last_slash !== false) {					
						$this->create_dirs($dest_dir.substr(zip_entry_name($zip_entry), 0, $pos_last_slash+1));			
					}            

					if (zip_entry_open($zip,$zip_entry,"r")) {                      
						$file_name = $dest_dir.zip_entry_name($zip_entry);    
						# 检查文件是否需要重写                        
						if ($overwrite === true || $overwrite === false && !is_file($file_name)) {                           
							# 读取压缩文件的内容                            
							$fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));                            
							@file_put_contents($file_name, $fstream);                           
							# 设置权限                            
							chmod($file_name, 0666);                    
						}                        
						# 关闭入口                        
						zip_entry_close($zip_entry);                    
					}                
				}               
				# 关闭压缩包 
				zip_close($zip); 
				if ($type === true) {
					if (unlink($src_file)) {
						return true; 
					} else {
						return false;
					}
				}           
			}        
		} else {
				return false;        
		}  
		return true;    
	}

	/**
	 * 初始化文件,建立文件目录,以及生产空压缩包，只对文件压缩时使用
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private function SetFile() {
		$path    = basename($this->gzfilename);// 获得压缩包名称
		$pathurl = dirname($this->gzfilename); // 返回去掉文件名后的目录名
		$pathurl = explode('/',$pathurl);
		$str = array_shift($pathurl);          // 获得路径中的第一个元素，并且从数组中删除
		$url = '';
		foreach ($pathurl as $value) {
			$url .= '/';
		}
		# 判断目录是否存在
		if (!is_dir($url)) {
			@mkdir($url);
		}

		# 创建压缩包，并且返回写入权限
		if ($this->fp = fopen($this->gzfilename, "w")) {
            return true;
        }
        return false;
    }
	
	/**
	 * 创建目录,只对文件解压时使用
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $path 文件路径
	 * @return void
	*/
	private function create_dirs($path) {	  
		if (!is_dir($path)) {		  
			$directory_path = "";		  
			$directories = explode("/", $path);		  
			array_pop($directories);		 
			foreach ($directories as $directory) {			 
				$directory_path .= $directory."/";			  
				if (!is_dir($directory_path)) {				  
					@mkdir($directory_path);				  
					chmod($directory_path, 0777);		 
				 }		  
			}	  
		}
	}

	/**
	 * 向压缩包内添加一个文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $name 文件路径
	 * @return void
	*/
	private function AddFile($name) {
		# 读取文件内容
		if (file_exists($name)) {
			$fp   = fopen($name,"r");
			$data = '';
			# 每次读取 1024 字节
			$buffer = 1024;
			# 循环读取，直至读取完整个文件
			while (!feof($fp)) {
				$data .= fread($fp,$buffer);
			} 
		} else {
			return false;
		}
		$dtime    = dechex($this->unix2DosTime());
		$hexdtime = '\x' . $dtime[6] . $dtime[7] . '\x' . $dtime[4] . $dtime[5] . '\x' . $dtime[2] . $dtime[3] . '\x' . $dtime[0] . $dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');
		
		$unc_len = strlen($data);
		$crc     = crc32($data);
		$zdata   = gzcompress($data);
		$c_len   = strlen($zdata);
		$zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		
		# 删除文件带的前缀只留下文件名
		$name = ltrim(str_replace([$this->Pakc, '.\\', './'], '', $name), '/');
		# 新添文件内容格式化:
		$datastr = "\x50\x4b\x03\x04";
		$datastr .= "\x14\x00"; // ver needed to extract
		$datastr .= "\x00\x00"; // gen purpose bit flag
		$datastr .= "\x08\x00"; // compression method
		$datastr .= $hexdtime; // last mod time and date
		$datastr .= pack('V', $crc); // crc32
		$datastr .= pack('V', $c_len); // compressed filesize
		$datastr .= pack('V', $unc_len); // uncompressed filesize
		$datastr .= pack('v', strlen($name)); // length of filename
		$datastr .= pack('v', 0); // extra field length
		$datastr .= $name;
		$datastr .= $zdata;
		$datastr .= pack('V', $crc); // crc32
		$datastr .= pack('V', $c_len); // compressed filesize
		$datastr .= pack('V', $unc_len); // uncompressed filesize
		fwrite($this->fp, $datastr); //写入新的文件内容
		$my_datastr_len = strlen($datastr);
		unset($datastr);//销毁变量
		
		# 新添文件目录信息
		$dirstr = "\x50\x4b\x01\x02";
		$dirstr .= "\x00\x00"; // version made by
		$dirstr .= "\x14\x00"; // version needed to extract
		$dirstr .= "\x00\x00"; // gen purpose bit flag
		$dirstr .= "\x08\x00"; // compression method
		$dirstr .= $hexdtime; // last mod time & date
		$dirstr .= pack('V', $crc); // crc32
		$dirstr .= pack('V', $c_len); // compressed filesize
		$dirstr .= pack('V', $unc_len); // uncompressed filesize
		$dirstr .= pack('v', strlen($name)); // length of filename
		$dirstr .= pack('v', 0); // extra field length
		$dirstr .= pack('v', 0); // file comment length
		$dirstr .= pack('v', 0); // disk number start
		$dirstr .= pack('v', 0); // internal file attributes
		$dirstr .= pack('V', 32); // external file attributes - 'archive' bit set
		$dirstr .= pack('V', $this->datastr_len); // relative offset of local header
		$dirstr .= $name;
		# 目录信息
		$this->dirstr .= $dirstr;
		$this->file_count++;
		$this->dirstr_len += strlen($dirstr);
		$this->datastr_len += $my_datastr_len;
		# 销毁变量
		unset($dirstr);
		return true;
	}

	/**
	 * 返回文件的修改时间格式
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param int $unixtime 时间戳
	 * @return void
	*/
    private function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        }
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) | ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }

	/**
	 * 释放压缩包资源
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @return void
	*/
	private function createfile() {
        # 压缩包结束信息,包括文件总数,目录信息读取指针位置等信息
        $endstr = "\x50\x4b\x05\x06\x00\x00\x00\x00" . pack('v', $this->file_count) . pack('v', $this->file_count) . pack('V', $this->dirstr_len) . pack('V', $this->datastr_len) . "\x00\x00";
        fwrite($this->fp, $this->dirstr . $endstr);
        fclose($this->fp);
	}
	
	/**
	 * 列出目录下所有文件
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $dir_name 目录名称
	 * @param mixed $
	 * @return void 无返回值，直接将字符串信息保存到$Araay成员中，使用|符分割
	*/
	private function ListFile($dir_name) {
		$dir_handle = opendir($dir_name);
		if (!$dir_handle) return false;
		# 文件名为‘0’时，readdir返回FALSE，判断返回值是否不全等
		while (false !== ($filename=readdir($dir_handle))) {
			if ($filename!='.' && $filename!='..') {
				if (is_dir($dir_name.$filename)) {
					$this->ListFile($dir_name.$filename.'/');
				} else {
					$array =  $this->Array.$dir_name.$filename.'|';
					$this->Array = $array;
				}			
			}
		}
		closedir($dir_handle);
	}

	/**
	 * 输出压缩包下载
	 * @todo 无
	 * @author 小黄牛
	 * @version v1.1.7 + 2019.03.29
	 * @deprecated 暂不弃用
	 * @global 无
	 * @param string $url 下载文件地址
	 * @return void
	*/
	public function dow_zip($url) {
		sleep(1);
		clearstatcache();
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($url));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($url));
		ob_clean();
		flush();
		readfile($url);
	}
}  