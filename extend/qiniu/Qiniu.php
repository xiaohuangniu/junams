<?php
// +----------------------------------------------------------------------
// | 七牛云OSS云存储
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://xiuxian.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace qiniu;
use think\Db;
// 引入鉴权类
use qiniu\Qiniu\Auth;
// 引入上传类
use qiniu\Qiniu\Storage\UploadManager;
// 引入管理类
use qiniu\Qiniu\Storage\BucketManager;

class Qiniu {
	protected static $accessKey;    // Access Key
	protected static $secretKey;    // Secret Key
	protected static $bucket;       // 上传空间名
	protected static $buckurl;      // 七牛云文件域名
	protected static $fileSize;     // 上传大小限制
    protected static $fileType;     // 上传类型限制
    protected static $status;       // 状态
    protected static $qiniu_zip;    // 压缩


    /**
     * 字节转换
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $size 字节数
     * @return int
    */
	public static function fileSize($size){
        $size = str_replace(['M', 'm'], '', $size);
		return 1024 * 1024 * $size;
	}
  
    /**
     * 判断是否gif动画
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @@param string $image_file 图片路径
     * @return bool
    */
	public static function check_gifcartoon($image_file){   
		$fp         = fopen($image_file,'rb');
		$image_head = fread($fp,1024);
		fclose($fp);   
		return preg_match("/".chr(0x21).chr(0xff).chr(0x0b).'NETSCAPE2.0'."/",$image_head) ? false : true;   
    }
    
    /**
     * 压缩本地图片
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $imgsrc 图片路径  
	 * @param string $imgdst 压缩后保存路径  
     * @return void
    */
	public static function image_png_size_add($imgsrc,$imgdst){   
		list($width,$height,$type)=getimagesize($imgsrc);   
		$new_width  = $width;   
		# 删除70px，防止底部有水印
		$new_height = $height - 70;   
		$height = $height - 70;
		
		switch($type){   
			case 1:   
			$giftype = $this->check_gifcartoon($imgsrc);   
			if($giftype){   
				header('Content-Type:image/gif');   
				$image_wp=imagecreatetruecolor($new_width, $new_height);   
				$image = imagecreatefromgif($imgsrc);   
				imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);   
				imagejpeg($image_wp, $imgdst,75);   
				imagedestroy($image_wp);   
			}   
			break;   
			case 2:   
			header('Content-Type:image/jpeg');   
			$image_wp=imagecreatetruecolor($new_width, $new_height);   
			$image = imagecreatefromjpeg($imgsrc);   
			imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);   
			imagejpeg($image_wp, $imgdst,75);   
			imagedestroy($image_wp);   
			break;   
			case 3:   
			header('Content-Type:image/png');   
			$image_wp=imagecreatetruecolor($new_width, $new_height);   
			$image = imagecreatefrompng($imgsrc);   
			imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);   
			imagejpeg($image_wp, $imgdst,75);   
			imagedestroy($image_wp);   
			break;   
		}   
    } 

    /**
     * 初始化参数
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return bool
    */
    private static function config() {
        $info = Db::name('config')->field('qiniu_zip,qiniu_size,qiniu_class,qiniu_status,qiniu_access_key,qiniu_secret_key,qiniu_space,qiniu_website')->where('id',1)->find();
        self::$accessKey = $info['qiniu_access_key'];
        self::$secretKey = $info['qiniu_secret_key'];
        self::$bucket    = $info['qiniu_space'];
        self::$buckurl   = $info['qiniu_website'];
        self::$fileSize  = self::fileSize($info['qiniu_size']);
        self::$fileType  = $info['qiniu_class'];
        self::$status    = $info['qiniu_status'];
        self::$qiniu_zip = $info['qiniu_zip'];

        if ($info['qiniu_status'] == 0) {
            return false;
        }
        return true;
    }

    /**
     * 获得限制大小
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return int
    */
    public static function get_size(){
        self::config();
        return self::$fileSize;
    }

    /**
     * 获得限制类型
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return string
    */
    public static function get_type(){
        self::config();
        return self::$fileType;
    }

    /**
     * 获得开启状态
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return int
    */
    public static function get_status(){
        self::config();
        return self::$status;
    }

    /**
     * 获得压缩状态
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @return int
    */
    public static function get_zip(){
        self::config();
        return self::$qiniu_zip;
    }
    
    /**
     * 删除七牛云图片
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $filePath 图片地址
     * @return bool
    */
	public static function delete($filePath){
        $res = self::config();
        if (!$res) {return false;}

		$filePath = str_replace(self::$buckurl, '', $filePath);
		# 构建鉴权对象
		$auth = new Auth(self::$accessKey, self::$secretKey);
		$del  = new BucketManager($auth);
		# 删除$bucket 中的文件 $key
		$err = $del->delete(self::$bucket, $filePath);
		if (empty($err)) {
			return true;
		}
		return false;
    }
    
    /**
     * 上传七牛云图片
     * @todo 无
     * @author 小黄牛
     * @version v1.0.0.1 + 2018.10.10
     * @deprecated 暂不弃用
     * @global 无
     * @param string $filePath 要上传文件的本地路径
	 * @param string $key 上传到七牛后保存的文件名
     * @return string|bool
    */
    public static function put($filePath, $key){
        $key = str_replace('\\', '/', $key);
        $res = self::config();
        if (!$res) {return false;}

		# 构建鉴权对象
		$auth = new Auth(self::$accessKey, self::$secretKey);
		# 生成上传 Token
		$token = $auth->uploadToken(self::$bucket);
		# 初始化 UploadManager 对象并进行文件的上传。
		$uploadMgr = new UploadManager();
		# 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
		if (empty($err)) {
			$result = unlink($filePath); 
			if ($result) {
				return self::$buckurl . $ret['key'];
			}
		}
		return false;
	}

}

