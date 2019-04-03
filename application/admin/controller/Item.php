<?php
// +----------------------------------------------------------------------
// | CMS模块 - 项目相关
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\common\controller\Backend;
use think\Db;
use think\Request;

class Item extends Backend{
    /*
     * 换行符
    */
    private $ds = "\r\n";
    /*
     * 每条sql语句的结尾符
    */
    public $sqlEnd = ';';

    /**
     * 上传logo
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function post_logo() {
        $file = request()->file('file');
        $path = ROOT_PATH . 'public' . DS . 'cms' . DS . 'logo' . DS;
        if (!is_writable($path)) {
            echo json_encode([
                'code' => '01',
                'msg'  => '请给与0777权限：'.$path,
                'data' => '',
            ], JSON_UNESCAPED_UNICODE);exit;
        }
        if($file){
            # 默认最大上传2M图片文件
            $info = $file->validate(['size'=>\qiniu\Qiniu::get_size(),'ext'=>\qiniu\Qiniu::get_type()])->move($path);
            if($info){
                $name = $info->getSaveName();
                $path = str_replace(['\\', '//'],'/', dirname($_SERVER['SCRIPT_NAME']) .DS. 'public' .DS. 'cms' .DS. 'logo' .DS. $name);
                # 成功上传后 获取上传信息
                if ($path) {
                    $this->addLog(47, '上传项目LOGO', 1, false);
                    echo json_encode([
                        'code' => 0,
                        'msg'  => '上传成功',
                        'data' => $path
                    ], JSON_UNESCAPED_UNICODE);exit;
                }
            }
            $this->addLog(47, '上传项目LOGO', 2, false);
            # 上传失败获取错误信息
            echo json_encode([
                'code' => '01',
                'msg'  => '上传失败：'.$file->getError(),
                'data' => '',
            ], JSON_UNESCAPED_UNICODE);exit;
        }
        exit;
    }

    /**
     * 项目列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $name = Request::instance()->get('name');
        $nick = Request::instance()->get('nick');

        $page_where = [
            'name' => $name,
            'nick' => $nick,
        ];

        $_where = [];

        if (!empty($name)) $_where['A.i_name']   = ['like', "%{$name}%"];
        if (!empty($nick)) $_where['A.i_author'] = ['like', "%{$nick}%"];

        $list = Db::name('item')
                ->alias('A')
                ->field('A.*')
                ->where($_where)
                ->paginate(15, false, [
                    'query' => $page_where
                ]);
		$page = $list->render();

		$this->assign('list', $list);
		$this->assign('page', $page);

        $this->assign('page_where', $page_where);
        return $this->fetch();
    }

    /**
     * 创建新项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name   = Request::instance()->post('name');
            $path   = strtolower(Request::instance()->post('path'));
            $des    = Request::instance()->post('des');
            $logo   = Request::instance()->post('post_logo');
            $author = Request::instance()->post('author');
            $time   = time();

            $DB     = Db::name('item');
            if ($path == 'index' || $path == 'admin' || $path == 'user' || $path == 'extra' || $path == 'common') {
                $this->json('01', '项目目录不能为 index、admin、user、extra、common'); 
            }
            if (empty($name) || empty($path) || empty($logo) || empty($author)) {
                $this->json('01', '请填写相关信息！');
            }
            if (!preg_match('/^[a-zA-Z]{2,16}$/i', $path)) {
                $this->addLog(48, '项目目录格式错误', 3, false);
                $this->json('01', '项目目录格式错误：只能为2-16位字母');
            }
            if ($DB->where('i_name', $name)->value('i_id')) {
                $this->addLog(48, '项目名称已存在', 3, false);
                $this->json('01', '项目名称已存在');
            }
            if ($DB->where('i_path', $path)->value('i_id')) {
                $this->addLog(48, '项目目录已存在', 3, false);
                $this->json('01', '项目目录已存在');
            }

            # 创建项目目录
            if (!is_writable(ROOT_PATH .'application'. DS)) {
                $this->json('01', 'application 目录请求给予0777权限！');
            }
            $A = ROOT_PATH .'application'. DS .$path. DS;
            mkdir($A, 0777);
            chmod($A, 0777);
            $B = $A. 'controller'. DS;
            mkdir($B, 0777);
            chmod($B, 0777);
            $C = $A. 'view'. DS;
            mkdir($C, 0777);
            chmod($C, 0777);
            $D = $A. 'wap'. DS;
            mkdir($D, 0777);
            chmod($D, 0777);

            # 入库做记录
            $data = [
                'i_id'       => uniqid(),
                'i_name'     => $name,
                'i_path'     => $path,
                'i_des'      => $des,
                'i_logo'     => $logo,
                'i_author'   => $author,
                'i_add_time' => time(),
            ];
           
            $res = $DB->insert($data);
            if ($res) {
                $this->addLog(48, '创建成功', 1, false);
                $this->json('00', '创建成功');
            }

            $this->addLog(48, '创建失败', 2, false);
            $this->json('01', '创建失败');
        }else{
			return $this->fetch();
		}
    }

    /**
     * 切换项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.8 + 2019.04.01
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function status($id=null) {
        if (empty($id)) {
            $id = Request::instance()->param('id');
        }
        $DB  = Db::name('item');
        $info = $DB->where('i_id', $id)->field('i_path, i_name, i_status')->find();
        if ($info['i_status'] == 1) {
            $this->json('00', '项目切换成功');
        }
        $i_path = $info['i_path'];
        $html = <<<EOF
<?php
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');

// 判断是否安装系统
if (!is_file(APP_PATH . 'database.php')) {
    header("location:./public/install.php");
    exit;
}

// 加载框架引导文件
require __DIR__ . '/thinkphp/base.php';

// 绑定到admin模块
\\think\Route::bind('{$i_path}');

// 执行应用
\\think\App::run()->send();
EOF;

        $path = ROOT_PATH . 'index.php';
        $stauts = file_put_contents($path, $html);

        $res1 = $DB->where("i_id != '$id'")->update(['i_status'=>0]);
        $res2 = $DB->where('i_id', $id)->update(['i_status'=>1]);
        if ($res1 && $res2 && $status) {
            $this->addLog(49, '项目切换成功', 1, false);
            $this->json('00', '项目切换成功');
        }
        $this->addLog(49, '项目切换失败，请查看index.php文件是否有写入权限', 2, false);
        $this->json('01', '项目切换失败，请查看index.php文件是否有写入权限');
    }

    /**
     * 修改项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('id');
        $DB   = Db::name('item');
        $res  = $DB->where('i_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name   = Request::instance()->post('name');
            $des    = Request::instance()->post('des');
            $logo   = Request::instance()->post('post_logo');
            $author = Request::instance()->post('author');
            
            if (empty($name) || empty($logo) || empty($author)) {
                $this->json('01', '请填写相关信息！');
            }
            if ($name != $res['i_name']) {
                if ($DB->where('i_name', $name)->value('i_id')) {
                    $this->addLog(50, '项目名称已存在', 3, false);
                    $this->json('01', '项目名称已存在');
                }
            }
            
            # 入库做记录
            $data = [
                'i_name'     => $name,
                'i_des'      => $des,
                'i_logo'     => $logo,
                'i_author'   => $author,
            ];
            
            $res =  $DB->where('i_id', $id)->update($data);
            if ($res > 0) {
                $this->addLog(50, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(50, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $this->assign('info', $res);
			return $this->fetch();
		}
    }

    /**
     * 复制目录到指定位置
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.28
     * @deprecated 暂不弃用
     * @global 无
     * @param string $src 原目录
     * @param mixed $dst 复制到的目录
     * @param mixed $status 是否文件迁移
     * @return void
    */
    private function copy_path($src, $dst, $status=false) {
        if ($status) {
            @mkdir(dirname($dst), 0777, true);
            return copy($src, $dst);
        }
        $dir = opendir($src);
        @mkdir($dst, 0777);
        while(false !== ( $file = readdir($dir)) ) {
            if ($file != '.' && $file != '..') {
                if (is_dir($src .DS. $file)) {
                    $this->copy_path($src.DS.$file, $dst.DS.$file);
                } else {
                    copy($src.DS.$file, $dst.DS.$file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * 插入表结构
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.29
     * @deprecated 暂不弃用
     * @global 无
     * @param string $table 表名称
     * @return void
    */
    private function _insert_table_structure($table) {
        $res = Db::query('SHOW CREATE TABLE `' . $table . '`');
        $row = $res[0];
        return $this->ds. "DROP TABLE IF EXISTS `" . $table . '`' . $this->sqlEnd . $this->ds. $this->ds . $row ['Create Table'] . $this->sqlEnd . $this->ds. $this->ds;
    }

    /**
     * 单条记录生成
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.29
     * @deprecated 暂不弃用
     * @global 无
     * @param string $table 表名称
     * @param array $record 数据
     * @return string
     */
    private function _insert_record($table, $record) {
		# 获得TR头
		$head = array_keys($record);
		# 获得TR内容
        $insert = "INSERT INTO `" . $table . "` VALUES(";
        foreach ($head as $v){
            $insert .= "'".$record[$v]."',";
        }
        $insert = rtrim($insert, ',') .');'.$this->ds;
		return $insert;
    }
    
    /**
     * 循环删除目录和文件函数
     * @todo 无
     * @author 小黄牛
     * @version v1.1.7 + 2019.03.29
     * @deprecated 暂不弃用
     * @global 无
     * @param string $dirName 目录地址
     * @return void
    */
    private function _delete_file($dirName)  { 
        if ($handle = opendir("$dirName")) { 
            while (false !== ( $item = readdir($handle))) { 
                if ($item != '.' && $item != '..' ) { 
                    $path = str_replace('//', '/', "$dirName/$item");
                    if ( is_dir($path)) { 
                        $this->_delete_file($path); 
                    } else { 
                        unlink($path); 
                    } 
                } 
            } 

            closedir( $handle ); 
            rmdir($dirName); 
        } 
    }
    
    /**
     * 导出项目
     * @todo 无
     * @author 小黄牛
     * @version v1.2.1 + 2019.04.02
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function export() {
        $zip  = ROOT_PATH.'public'.DS.'cms'.DS.'zip'.DS;
        $obj  = new \org\Zip();

        $path = Request::instance()->param('path');
        # 下载压缩包
        if (!empty($path)) {
            $obj->dow_zip($zip.$path.'.zip');
            exit;
        }

        $id = Request::instance()->param('id');
        $info = Db::name('item')->where('i_id', $id)->find();
        $info['i_logo'] = str_replace('\\', '/', $info['i_logo']);
        $ready = ROOT_PATH.'public'.DS.'cms'.DS.'ready'.DS;
        
        # 清空5大导出要素
        # 1、清空code
        $this->_delete_file($ready.'code'.DS);
        mkdir($ready.'code'.DS, 0777);
        chmod($ready.'code'.DS, 0777);
        # 2、清空logo
        $this->_delete_file($ready.'logo'.DS);
        mkdir($ready.'logo'.DS, 0777);
        chmod($ready.'logo'.DS, 0777);
        # 3、清空static
        $this->_delete_file($ready.'static'.DS);
        mkdir($ready.'static'.DS, 0777);
        chmod($ready.'static'.DS, 0777);
        # 4、清空add.sql
        file_put_contents($ready.'prefix.txt','');
        # 5、清空prefix.txt
        file_put_contents($ready.'add.sql', '');
        # 6、删除zip
        if (file_exists($zip.$info['i_path'].'.zip')) {
            unlink($zip.$info['i_path'].'.zip');
        }

        # 不允许导出index目录
        if ($info['i_path'] == 'index') {
            $this->json('01', '系统限制：不允许导出index项目，因为该项目为系统Demo');
        }

        # 数据库前缀
        $prefix = \think\Config::get('database.prefix');
        # 1、导出项目SQL
        $sql = $this->_insert_record($prefix.'item', $info);
        
        # 读取项目对应的数据表
        $model = Db::name('item_model')->where('i_id', $id)->select();
        foreach ($model as $v) {
            # 读取模型对应的数据
            $sql .= $this->_insert_record($prefix.'item_model', $v);
            # 导出表结构
            $sql .= $this->_insert_table_structure($prefix.$v['im_table']);
            # 导出表对应的全部数据
            $list = Db::name($v['im_table'])->select();
            foreach ($list as $val) {
                $sql .= $this->_insert_record($prefix.$v['im_table'], $val);
            }
            # 如果有附表，则也需要读取附表信息
            if ($v['im_class'] == 1) {
               # 导出表结构
                $sql .= $this->_insert_table_structure($prefix.$v['im_table'].'_data');
                # 导出表对应的全部数据
                $list = Db::name($v['im_table'].'_data')->select();
                foreach ($list as $val) {
                    $sql .= $this->_insert_record($prefix.$v['im_table'].'_data', $val);
                } 
            }
        }
        
        # 读取项目对应的栏目数据
        $list = Db::name('item_column')->where('i_id', $id)->select();
        foreach ($list as $val) {
            $sql .= $this->_insert_record($prefix.'item_column', $val);
        }
        # 读取项目对应的ILDM数据
        $list = Db::name('item_content')->where('i_id', $id)->select();
        foreach ($list as $val) {
            $sql .= $this->_insert_record($prefix.'item_content', $val);
        }
        
        # 2、写入表前缀
        file_put_contents($ready.'prefix.txt', $prefix);
        # 3、写入项目SQL
        file_put_contents($ready.'add.sql', $sql);
        
        # 4、复制后端文件到指定文件夹
        $this->copy_path(ROOT_PATH.'application'.DS.$info['i_path'].DS, $ready.'code'.DS.$info['i_path'].DS);
        # 5、复制前端文件到指定文件夹
        $this->copy_path(ROOT_PATH.'public'.DS.'home'.DS.$info['i_path'].DS, $ready.'static'.DS.$info['i_path'].DS);
        # 6、复制LOGO到指定文件夹
        $li = explode('cms', $info['i_logo']);
        $this->copy_path(ROOT_PATH.ltrim($info['i_logo'], '/'), ROOT_PATH.'public'.DS.'cms'.DS.'ready'.$li[1], true);
        # 7、打包成zip
        $res =$obj->save_zip($zip, $ready, $zip.$info['i_path'], 'zip', true);
        # 打包成功
        $this->json('00', '项目打包成功');
    }
    
    /**
     * 删除项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.8 + 2019.04.01
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id = Request::instance()->param('id');
        $info = Db::name('item')->where('i_id', $id)->find();
        if (!$info) {
            $this->addLog(73, '项目不存在！', 2, false);
            $this->json('01', '项目不存在！');
        }
        # 1、删除项目logo
        @unlink(ROOT_PATH.ltrim(str_replace('\\', '/', $info['i_logo']), '/'));
        # 2、删除项目模型和表
        $model = Db::name('item_model')->where('i_id', $id)->select();
        $prefix = \think\Config::get('database.prefix');
        foreach ($model as $v) {
            $table = $prefix . $v['im_table'];
            $tabledata = $table.'_data';
            # 删除主表
            $sql ="drop table ".$table.";";
            $res = Db::execute($sql);
            if ($res===false) {
                $this->addLog(73, $table.'表删除失败！', 2, false);
                $this->json('01', $table.'表删除失败！');
            }
            # 如果有附表，则也需要删除
            if ($v['im_class'] == 1) {
                $sql ="drop table ".$tabledata.";";
                $res = Db::execute($sql);
                if ($res===false) {
                    $this->addLog(73, $tabledata.'表删除失败！', 2, false);
                    $this->json('01', $tabledata.'表删除失败！');
                }
            }
            # 删除模型对应的全部字段
            $res = Db::name('item_field')->where('im_id', $v['im_id'])->delete();
            if ($res === false) {
                $this->addLog(73, $v['im_table'].'对应的字段信息删除失败！', 2, false);
                $this->json('01', $v['im_table'].'对应的字段信息删除失败！');
            }
        }
        # 删除全部模型
        $res = Db::name('item_model')->where('i_id', $id)->delete();
        if ($res === false) {
            $this->addLog(73, '项目对应的数据模型删除失败！', 2, false);
            $this->json('01', '项目对应的数据模型删除失败！');
        }
        # 3、删除项目栏目
        $res = Db::name('item_column')->where('i_id', $id)->delete();
        if ($res === false) {
            $this->addLog(73, '项目对应的栏目数据删除失败！', 2, false);
            $this->json('01', '项目对应的栏目数据删除失败！');
        }
        # 4、删除项目对应的控制器
        $res = Db::name('item_content')->where('i_id', $id)->delete();
        if ($res === false) {
            $this->addLog(73, '项目对应的ILDM数据删除失败！', 2, false);
            $this->json('01', '项目对应的ILDM数据删除失败！');
        }
        # 5、删除项目文件
        $file = ROOT_PATH.'application'.DS.$info['i_path'].DS;
        if (file_exists($file)) {
            $this->_delete_file($file);
        }
        # 6、删除项目
        $res = Db::name('item')->where('i_id', $id)->delete();
        if ($res === false) {
            $this->addLog(73, '项目删除失败！', 2, false);
            $this->json('01', '项目删除失败！');
        }
        # 7、切换最近的项目为选中
        $i_id = Db::name('item')->order('i_add_time ASC')->value('i_id');
        if ($i_id) {
            $this->status($id);
        }
        $this->addLog(73, '项目删除成功！', 1, false);
        $this->json('00', '项目删除成功！');
    }

    /**
     * 导入项目
     * @todo 无
     * @author 小黄牛
     * @version v1.1.8 + 2019.04.01
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function decompose() {
        $path = ROOT_PATH.'public'.DS.'cms'.DS.'decompose'.DS;

        # 1、压缩包上传
        $file = request()->file('file');
        if (!$file) $this->json('01', '请选择需要导入的项目文件！');
        $info = $file->validate(['size'=>(1024*1024*48), 'ext'=>'zip'])->move($path, '');
        if (!$info) $this->json('01', '压缩包上传失败：'.$file->getError());
        $zip = $path.$info->getFilename();
        sleep(1);

        # 2、解压压缩包
        $obj = new \org\Zip();
        $obj->un_zip($zip, $path, false);
        # 3、复制文件到指定位置
        $code   = $this->get_file($path.'code'.DS, ROOT_PATH.'application'.DS);
        $logo   = $this->get_file($path.'logo'.DS, ROOT_PATH.'public'.DS.'cms'.DS.'logo'.DS);
        $static = $this->get_file($path.'static'.DS, ROOT_PATH.'public'.DS.'home');

        # 4、读取SQL文件，替换表前缀
        $prefix = \think\Config::get('database.prefix');
        $sql = file_get_contents($path.'add.sql');
        $prefixA = file_get_contents($path.'prefix.txt');
        $sql = str_replace($prefixA, $prefix, $sql);

        # 5、执行SQL
        $mysqlHostname = \think\Config::get('database.hostname');
        $mysqlHostport = \think\Config::get('database.hostport');
        $mysqlUsername = \think\Config::get('database.username');
        $mysqlPassword = \think\Config::get('database.password');
        $mysqlDatabase = \think\Config::get('database.database');

        $pdo = new \PDO("mysql:host={$mysqlHostname};port={$mysqlHostport}", $mysqlUsername, $mysqlPassword, array(
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));

        $pdo->query("CREATE DATABASE IF NOT EXISTS `{$mysqlDatabase}` CHARACTER SET utf8 COLLATE utf8_general_ci;");
        $pdo->query("USE `{$mysqlDatabase}`");
        $pdo->exec($sql);

        # 6、删除压缩文件
        @unlink($path.'add.sql');
        @unlink($path.'a.sql');
        @unlink($path.'prefix.txt');
        @unlink($zip);

        # 7、完成解压
        $this->json('00', '导入成功！');
    }

    /**
     * 复制指定文件到指定目录
     * @todo 无
     * @author 小黄牛
     * @version v1.1.8 + 2019.04.01
     * @deprecated 暂不弃用
     * @global 无
     * @param string $file 复制文件路径
     * @param string $file2 存放文件路径
     * @return void
    */
    private function get_file($file, $file2) {
        $dir = scandir($file);
        
        if (!file_exists($file2.$dir[2].DS)) {
            $this->copy_path($file, $file2);
            $this->_delete_file($file);
        }
    }

}