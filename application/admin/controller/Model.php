<?php
// +----------------------------------------------------------------------
// | CMS模块 - 模型管理
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

class Model extends Backend{

    /**
     * 模型列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $item = Db::name('item')->where('i_status', 1)->value('i_id');
        $list = Db::name('item_model')->where('i_id', $item)->select();

        # 获取当前项目信息
        $this->assign('item', $item);
		$this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 创建新模型
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
        $item = Db::name('item')->where('i_status', 1)->value('i_id');

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name   = Request::instance()->post('name');
            $table  = strtolower(Request::instance()->post('table'));
            $des    = Request::instance()->post('des');
            $type   = Request::instance()->post('type');
            $class  = Request::instance()->post('class');
            $time   = time();

            # 判断模型名和表名是否为空
			if (empty($name) || empty($table)) {
                $this->json('01', '模型名称 或 模型表键名 不能为空!');
            }

            # 获取当前项目信息
            if (!$item) {
                $this->json('01', '请前往项目管理模块，选中一个项目！');
            }

            # 拼接出完整的新模型表名
            $prefix = \think\Config::get('database.prefix');
            $charset = \think\Config::get('database.charset');
			$tablename = $prefix . $table;
			# 再判断表名是否存在，判断数据库的表名，进行对比判断
			$info = Db::query('show tables');
			# 获得表名进行对比
			foreach ($info as $key=>$value) {
			    foreach ($value as $row) {
				    if ($row === $tablename) {
                        $this->json('01', '模型键表名已经存在，请修改');
                    }
                }
            }
            # 构造新模型表初始化的SQL
            $sql = <<<EOF
CREATE TABLE `{$tablename}` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `columnpid` varchar(15) NOT NULL COMMENT '栏目id',
    `status` tinyint(1) DEFAULT '0' COMMENT '状态 0|1 禁用|启用',
    `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
    UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={$charset} AUTO_INCREMENT=1 COMMENT='{$name}表';
EOF;
			# 执行SQL，创建表
			$res = Db::execute($sql);
			if ($res===false) {
                $this->json('01', '新模型的数据表创建失败,请检查对应数据库权限！');
            }
            # 需要创建附表
            if ($class == 1) {
                $sql = <<<EOF
CREATE TABLE `{$tablename}_data` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `pid` INT unsigned NOT NULL COMMENT '主表id',
    UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={$charset} AUTO_INCREMENT=1 COMMENT='{$name}附属表';
EOF;
                $res = Db::execute($sql);
                if ($res===false) {
                    $this->json('01', '附表创建失败！请手动删除已经创建的主表！');
                }
            }

            # 入库做记录
            $data = [
                'im_id'       => uniqid(),
                'i_id'        => $item,
                'im_name'     => $name,
                'im_table'    => $table,
                'im_des'      => $des,
                'im_type'     => $type,
                'im_class'    => $class,
                'im_add_time' => time(),
                'im_author'   => $this->admin['m_nice']
            ];
           
            $res = Db::name('item_model')->insert($data);
            if ($res) {
                $this->addLog(51, '创建成功', 1, false);
                $this->json('00', '创建成功');
            }

            $this->addLog(51, '创建失败', 2, false);
            $this->json('01', '创建失败');
        }else{
            $this->assign('item', $item);
			return $this->fetch();
		}
    }

    /**
     * 切换状态
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function status() {
        $id = Request::instance()->param('pid');
        $status = Request::instance()->param('status');
        $res = Db::name('item_model')->where('im_id', $id)->update(['im_status'=>$status]);
        if ($res) {
            $this->addLog(52, '模型状态切换成功', 1, false);
            $this->json('00', '模型状态切换成功');
        }
        $this->addLog(52, '模型状态切换失败', 2, false);
        $this->json('01', '模型状态切换失败');
    }

    /**
     * 修改模型
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('pid');
        $DB   = Db::name('item_model');
        $res  = $DB->where('im_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $name   = Request::instance()->post('name');
            $table  = strtolower(Request::instance()->post('table'));
            $des    = Request::instance()->post('des');
            $type   = Request::instance()->post('type');
            $class  = Request::instance()->post('class');
            $time   = time();

            # 判断模型名和表名是否为空
			if (empty($name) || empty($table)) {
                $this->json('01', '模型名称 或 模型表键名 不能为空!');
            }
            
            # 拼接出完整的新模型表名
            $prefix = \think\Config::get('database.prefix');
            $charset = \think\Config::get('database.charset');
            $tablename = $prefix . $table;
            # 表名是否需要修改
            if ($res['im_table'] != $table) {
                # 再判断表名是否存在，判断数据库的表名，进行对比判断
                $info = Db::query('show tables');
                # 获得表名进行对比
                foreach ($info as $key=>$value) {
                    foreach ($value as $row) {
                        if ($row === $tablename) {
                            $this->json('01', '模型键表名已经存在，请修改');
                        }
                    }
                }
                # 构造修改表名
                $sql  ="alter table ".$prefix.$res['im_table']." rename ".$tablename.";";
                $res2 = Db::execute($sql);
                if ($res2===false) {
                    $this->json('01', '表名修改失败！');
                }
                # 原来有附表，就把附表也改了
                if ($res['im_class'] == 1) {
                    $sql  ="alter table ".$prefix.$res['im_table']."_data rename ".$tablename."_data;";
                    $res2 = Db::execute($sql);
                    if ($res2===false) {
                        $this->json('01', '附属表名修改失败！');
                    }
                }
                # 现在没有附表了，就把附表删除
                if ($class != 1 && $res['im_class'] == 1) {
                    $sql="drop table ".$tablename."_data;";
                    $res2 = Db::execute($sql);
                    if ($res2===false) {
                        $this->json('01', '附属表删除失败！');
                    }
                    # 把属于附表的字段删除
                    $res2 = Db::name('item_field')->where([
                        'im_id' => $id,
                        'if_is_data' => 1,
                    ])->delete();
                    if ($res2 === false) {
                        $this->json('01', '附属表对应的field字段，删除失败！');
                    }
                # 创建附表
                } else if ($class == 1 && $res['im_class'] != 1) {
                    $sql = <<<EOF
CREATE TABLE `{$tablename}_data` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `pid` INT unsigned NOT NULL COMMENT '主表id',
    UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={$charset} AUTO_INCREMENT=1 COMMENT='{$name}附属表';
EOF;
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->json('01', '附表创建失败！请手动删除已经创建的主表！');
                    }
                }
            } else {
                # 现在没有附表了，就把附表删除
                if ($class != 1 && $res['im_class'] == 1) {
                    $tablename = $prefix.$res['im_table'];
                    $sql="drop table ".$tablename."_data;";
                    $res2 = Db::execute($sql);
                    if ($res2===false) {
                        $this->json('01', '附属表删除失败！');
                    }
                    # 把属于附表的字段删除
                    $res2 = Db::name('item_field')->where([
                        'im_id' => $id,
                        'if_is_data' => 1,
                    ])->delete();
                    if ($res2 === false) {
                        $this->json('01', '附属表对应的field字段，删除失败！');
                    }
                # 创建附表
                } else if ($class == 1 && $res['im_class'] != 1) {
                    $tablename = $prefix.$res['im_table'];
                    $sql = <<<EOF
CREATE TABLE `{$tablename}_data` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `pid` INT unsigned NOT NULL COMMENT '主表id',
    UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={$charset} AUTO_INCREMENT=1 COMMENT='{$name}附属表';
EOF;
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->json('01', '附表创建失败！请手动删除已经创建的主表！');
                    }
                }
            }
			
            # 入库做记录
            $data = [
                'im_name'     => $name,
                'im_table'    => $table,
                'im_des'      => $des,
                'im_type'     => $type,
                'im_class'    => $class
            ];
           
            $res = Db::name('item_model')->where('im_id', $id)->update($data);
            if ($res) {
                $this->addLog(57, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(57, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $this->assign('info', $res);
			return $this->fetch();
		}
    }

    /**
     * 删除目录及目录下所有文件或删除指定文件
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @param string $path 待删除目录路径
     * @param int $delDir 是否删除目录
     * @return void
    */
    private function delDirAndFile($path, $delDir = false) {
        $message = "";
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$path/$item")) {
                        $msg = $this->delDirAndFile($path.$item, $delDir);
                        if ( $msg ){
                            $message .= $msg;
                        }
                    } else {
                        unlink($path.$item);
                    }
                }
            }
            closedir($handle);
        } else {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /**
     * 删除模型
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id   = Request::instance()->param('id');
        $DB   = Db::name('item_model');
        $model = $DB->where('im_id', $id)->find();
        # 拼接出完整的新模型表名
        $prefix = \think\Config::get('database.prefix');
        $table = $prefix . $model['im_table'];
        $tabledata = $table.'_data';

        # 删除模型
        $res  = $DB->where('im_id', $id)->delete();
        if ($res === false) {
            $this->addLog(58, '模型删除失败！', 2, false);
            $this->json('01', '模型删除失败！');
        }

        # 删除字段
        $res  = Db::name('item_field')->where('im_id', $id)->delete();
        if ($res === false) {
            $this->addLog(58, '对应的字段删除失败！', 2, false);
            $this->json('01', '对应的字段删除失败！');
        }
        
        $listA = Db::name('item_content')->where('im_id', $id)->field('ic_id')->select();

        $list  = Db::name('item_content')->where('im_id', $id)->group('ic_name')->select();
        # 删除表单对应的文件
        $item = Db::name('item')->where('i_status', 1)->field('i_id, i_path')->find();
        $A = ROOT_PATH .'application'. DS .$item['i_path']. DS;
        $controller_path = $A.'controller'.DS;
        $view_path = $A.'view'.DS;
        $wap_path = $A.'wap'.DS;
        foreach ($list as $info) {
            //删除控制器
            $res = @unlink($controller_path.ucfirst($info['ic_name']).'.php');
            //删除PC端模板文件
            $path = $view_path.strtolower($info['ic_name']).DS;
            $res = $this->delDirAndFile($path, true);
            @chmod($path,0777);
            @unlink($path);
            if ($info['ic_wap'] == 1) {
                //删除WAP端模板文件
                $path = $wap_path.strtolower($info['ic_name']).DS;
                $res = $this->delDirAndFile($path, true);
                @chmod($path,0777);
                @unlink($path);
            }
        }

        # 删除模型对应的表单
        $res = Db::name('item_content')->where('im_id', $id)->delete();
        if ($res===false) {
            $this->addLog(58, $model['im_name'].'模型-栏目删除失败！', 2, false);
            $this->json('01', $model['im_name'].'模型-栏目删除失败！');
        }

        # 删除模型对应的表
        $sql ="drop table ".$table.";";
        $res = Db::execute($sql);
        if ($res===false) {
            $this->addLog(58, $table.'表删除失败！', 2, false);
            $this->json('01', $table.'表删除失败！');
        }
        # 删除附属表
        if ($model['im_class'] == 1) {
            $sql ="drop table ".$tabledata.";";
            $res = Db::execute($sql);
            if ($res===false) {
                $this->addLog(58, $tabledata.'表删除失败！', 2, false);
                $this->json('01', $tabledata.'表删除失败！');
            }
        }

        $this->addLog(58, $model['im_name'].'模型删除成功！', 2, false);
        $this->json('00', $model['im_name'].'模型删除成功！');
    }
}