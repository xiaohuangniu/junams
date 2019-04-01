<?php
// +----------------------------------------------------------------------
// | CMS模块 - 字段管理
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

class Field extends Backend{
    private $route = [
        'id','columnpid','time','pid','status'
    ];

    /**
     * 字段列表
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.18
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function index(){
        $id = Request::instance()->param('pid');
        $list = Db::name('item_field')->where('im_id', $id)->order('if_sort DESC')->select();
        $this->assign('list', $list);
        $this->assign('pid', $id);
        return $this->fetch();
    }

    /**
     * 删除字段
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function delete() {
        $id = Request::instance()->param('id');
        $info = Db::name('item_field')->where('if_id', $id)->field('im_id,if_name,if_is_data')->find();

        if (!$info) {
            $this->json('01', '字段不存在！');
        }
        $table= Db::name('item_model')->where('im_id', $info['im_id'])->value('im_table');
        if (!$info) {
            $this->json('01', '对应模型不存在！');
        }

        # 拼接出完整的新模型表名
        $prefix = \think\Config::get('database.prefix');
        $charset = \think\Config::get('database.charset');
        $tablename = $prefix . $table;
        # 是否为附表字段
        if ($info['if_is_data'] == 1) {
            $tablename .= '_data';
        }

        # 构造删除字段的SQL
        $sql = "alter table ".$tablename." drop column ".$info['if_name']."";

        $res = Db::execute($sql);
        if ($res === false) {
            $this->json('01', '字段删除失败！');
        }

        # 删除字段数据
        $res = DB::name('item_field')->where('if_id', $id)->delete();
        if ($res) {
            $this->addLog(54, '字段删除成功', 1, false);
            $this->json('00', '字段删除成功');
        }
        $this->addLog(54, '字段删除失败', 2, false);
        $this->json('01', '字段删除失败');
    }

    /**
     * 创建新字段
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function add(){
        $pid = Request::instance()->param('pid');
		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $type    = Request::instance()->post('type');// 字段类型
            $name    = strtolower(Request::instance()->post('name'));// 字段名称
            $title   = Request::instance()->post('title');// 字段别名
            $length  = Request::instance()->post('length');// 字段长度
            $des     = Request::instance()->post('des');// 字段提示
            $text    = Request::instance()->post('text');// 编辑器类型
            $content = Request::instance()->post('content');// 表单特殊内容
            $default = Request::instance()->post('default2');// 默认值
            $min     = Request::instance()->post('min');// 最小长度
            $max     = Request::instance()->post('max');// 最大长度
            $regular = Request::instance()->post('regular');// 正则表达式
            $alert   = Request::instance()->post('alert');// 正则错误提示
            $notnull = Request::instance()->post('notnull');// 是否必填
            $only    = Request::instance()->post('only');// 是否唯一
            $is_data = Request::instance()->post('is_data');// 是否附表
            $DB      = Db::name('item_field');

            if (in_array($name, $this->route)) {
                $this->json('01', $name.'：该字段名已被系统使用，请修改后再次提交！');
            }
            $where = [
                'im_id' => $pid,
                'if_name' => $name,
            ];
            $res = $DB->where($where)->value('if_id');
            if ($res) {
                $this->json('01', $name.'：该字段名已使用！');
            }

            # 先判断数据类型
			switch ($type){
                case 'int':
			  		$type2='DECIMAL';break;//数字类型 
				case 'text':
			  		$type2='VARCHAR';break;//普通文本 
				case 'radio':
			  		$type2='VARCHAR';break;//单选按钮
				case 'checkbox':
			  		$type2='VARCHAR';break;//多选按钮
				case 'select':
			  		$type2='VARCHAR';break;//下拉列表
				case 'enclosure':
			  		$type2='VARCHAR';break;//附件上传
                case 'image':
			  		$type2='VARCHAR';break;//单图片上传
				case 'textarea':
			  		$type2='text';$length='';break;//多行文本
				case 'editor':
			  		$type2='mediumtext';$length='';break;//编辑器
				case 'images':
			  		$type2='mediumtext';$length='';break;//多图片上传
                default:
                    $this->json('01', '字段类型错误，重新选择对应字段类型！');
				break;
			}

            # 给字段设置默认长度
            if ($type == 'int' && empty($length)) {
                $length = 11;
            } else if (($type=='text' || $type=='radio' || $type=='checkbox' || $type=='select' || $type=='enclosure'|| $type=='image') && empty($length)) {
                $length = 255;
            }

            # 查询出模型表
            $model = Db::name('item_model')->where('im_id', $pid)->field('im_table, im_class')->find();
            # 拼接出完整的新模型表名
            $prefix = \think\Config::get('database.prefix');
            $charset = \think\Config::get('database.charset');
            $tablename = $prefix . $model['im_table'];
            # 是否为附表字段
            if ($is_data == 1 && $model['im_class'] == 1) {
                $tablename .= '_data';
            }
            
            # 先插入字段 - 特殊字段类型需要处理下
			if ($type2 == 'mediumtext') {
				$sql='alter table "'.$tablename.'" add "'.$name.'" "'.$type2.'" COMMENT "'.$title.'";';
			}else{
                $sql='alter table "'.$tablename.'" add "'.$name.'" "'.$type2;
                if ($length) {
                    $sql .= '("'.$length.'")';
                }
                $sql .= " COMMENT '".$title."';";
            }
            $sql = str_replace('"','',$sql);
            $res = Db::execute($sql);
            if ($res===false) {
                $this->json('01', '字段创建失败！');
            }

            if (empty($length)) $only = 0;
            
            # 入库做记录
            $data = [
                'if_id'       => uniqid(),
                'im_id'       => $pid,
                'if_type'     => $type,
                'if_name'     => $name,
                'if_title'    => $title,
                'if_length'   => $length,
                'if_des'      => $des,
                'if_text'     => $text,
                'if_content'  => $content,
                'if_default'  => $default,
                'if_min'      => $min,
                'if_max'      => $max,
                'if_regular'  => $regular,
                'if_alert'    => $alert,
                'if_notnull'  => $notnull,
                'if_only'     => $only,
                'if_is_data'  => $is_data,
                'if_author'   => $this->admin['m_nice'],
                'if_add_time' => time(),
            ];
            $res = $DB->insert($data);
            if ($res) {
                # 再判断相应的字段属性，组合新的SQL			
                # 添加唯一
                if ($only == 1){
                    $sql = 'alter table "'.$tablename.'" add unique ("'.$name.'")';
                    $sql = str_replace('"','',$sql);                         
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->addLog(53, '字段已创建，但唯一索引添加失败', 2, false);
                        $this->json('01', '字段已创建，但唯一索引添加失败');
                    }
                }
                $this->addLog(53, '创建成功', 1, false);
                $this->json('00', '创建成功');
            }

            $this->addLog(53, '创建失败', 2, false);
            $this->json('01', '创建失败');
        }else{
            $this->assign('pid', $pid);
            $status = Db::name('item_model')->where('im_id', $pid)->value('im_class');
            $this->assign('status', $status);
			return $this->fetch();
		}
    }

    /**
     * 切换状态
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function status() {
        $id     = Request::instance()->param('pid');
        $status = Request::instance()->param('status');

        $res = Db::name('item_field')->where('if_id', $id)->update(['if_status'=>$status]);

        if ($res) {
            $this->addLog(55, '状态切换成功', 1, false);
            $this->json('00', '状态切换成功');
        }
        $this->addLog(55, '状态切换失败', 2, false);
        $this->json('01', '状态切换失败');
    }

    /**
     * 修改排序
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.21
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function sort() {
        $id   = Request::instance()->param('pid');
        $type = Request::instance()->param('type');
        
        # +1
        if ($type == 1) {
            $res = Db::name('item_field')->where('if_id', $id)->setInc('if_sort');
        } else {
            $res = Db::name('item_field')->where('if_id', $id)->setDec('if_sort');
        }
        
        if ($res) {
            $this->addLog(64, '排序切换成功', 1, false);
            $this->json('00', '排序切换成功');
        }
        $this->addLog(64, '排序切换失败', 2, false);
        $this->json('01', '排序切换失败');
    }

    /**
     * 修改字段
     * @todo 无
     * @author 小黄牛
     * @version v1.1.4 + 2019.03.19
     * @deprecated 暂不弃用
     * @global 无
     * @return void
    */
    public function upd(){
        # 获取ID
        $id   = Request::instance()->param('pid');
        $DB   = Db::name('item_field');
        $field  = $DB->where('if_id', $id)->find();

		# 判断是否AJAX请求
        if (Request::instance()->isAjax()) {
            $type    = Request::instance()->post('type');// 字段类型
            $name    = strtolower(Request::instance()->post('name'));// 字段名称
            $title   = Request::instance()->post('title');// 字段别名
            $length  = Request::instance()->post('length');// 字段长度
            $des     = Request::instance()->post('des');// 字段提示
            $text    = Request::instance()->post('text');// 编辑器类型
            $content = Request::instance()->post('content');// 表单特殊内容
            $default = Request::instance()->post('default2');// 默认值
            $min     = Request::instance()->post('min');// 最小长度
            $max     = Request::instance()->post('max');// 最大长度
            $regular = Request::instance()->post('regular');// 正则表达式
            $alert   = Request::instance()->post('alert');// 正则错误提示
            $notnull = Request::instance()->post('notnull');// 是否必填
            $only    = Request::instance()->post('only');// 是否唯一
            $is_data = Request::instance()->post('is_data');// 是否附表
            $DB      = Db::name('item_field');

            if (in_array($name, $this->route)) {
                $this->json('01', $name.'：该字段名已被系统使用，请修改后再次提交！');
            }

            # 先判断数据类型
			switch ($type){
                case 'int':
			  		$type2='DECIMAL';break;//数字类型 
				case 'text':
			  		$type2='VARCHAR';break;//普通文本 
				case 'radio':
			  		$type2='VARCHAR';break;//单选按钮
				case 'checkbox':
			  		$type2='VARCHAR';break;//多选按钮
				case 'select':
			  		$type2='VARCHAR';break;//下拉列表
				case 'enclosure':
			  		$type2='VARCHAR';break;//附件上传
                case 'image':
			  		$type2='VARCHAR';break;//单图片上传
				case 'textarea':
			  		$type2='text';$length='';break;//多行文本
				case 'editor':
			  		$type2='mediumtext';$length='';break;//编辑器
				case 'images':
			  		$type2='mediumtext';$length='';break;//多图片上传
                default:
                    $this->json('01', '字段类型错误，重新选择对应字段类型！');
				break;
			}

            # 给字段设置默认长度
            if ($type == 'int' && empty($length)) {
                $length = 11;
            } else if (($type=='text' || $type=='radio' || $type=='checkbox' || $type=='select' || $type=='enclosure'|| $type=='image') && empty($length)) {
                $length = 255;
            }

            if (empty($length)) $only = 0;

            # 查询出模型表
            $model = Db::name('item_model')->where('im_id', $field['im_id'])->field('im_table, im_class')->find();
            # 拼接出完整的新模型表名
            $prefix = \think\Config::get('database.prefix');
            $charset = \think\Config::get('database.charset');
            $tablename = $prefix . $model['im_table'];
            # 是否在附表，主表间重新切换字段
            $status    = false;
            # 附表切回主表，主表切回附表
            if ( ($field['if_is_data'] == 1 && $is_data == 0) || ($field['if_is_data'] == 0 && $is_data == 1) ) {
                $status = true;
                # 切换删除表
                if ($field['if_is_data'] == 1) {
                    $tablename2 = $tablename.'_data';
                } else {
                    $tablename2 = $tablename;
                    $tablename .= $tablename.'_data';
                }
                
            }
            # 需要删除字段，然后重建字段
            if ($status) {
                # 构造删除字段的SQL
                $sql = "alter table ".$tablename2." drop column ".$field['if_name']."";
                $res = Db::execute($sql);
                if ($res === false) {
                    $this->json('01', '字段删除失败！');
                }
                # 先插入字段 - 特殊字段类型需要处理下
                if ($type2 == 'mediumtext') {
                    $sql='alter table "'.$tablename.'" add "'.$name.'" "'.$type2.'" COMMENT "'.$title.'";';
                }else{
                    $sql='alter table "'.$tablename.'" add "'.$name.'" "'.$type2;
                    if ($length) {
                        $sql .= '("'.$length.'")';
                    }
                    $sql .= " COMMENT '".$title."';";
                }
                $sql = str_replace('"','',$sql);
                $res = Db::execute($sql);
                if ($res===false) {
                    $this->json('01', '字段创建失败！');
                }
                
                # 再判断相应的字段属性，组合新的SQL			
                # 添加唯一
                if ($only == 1){
                    $sql = 'alter table "'.$tablename.'" add unique ("'.$name.'")';
                    $sql = str_replace('"','',$sql);                         
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->addLog(56, '字段已创建，但唯一索引添加失败', 2, false);
                        $this->json('01', '字段已创建，但唯一索引添加失败');
                    }
                }
            # 只修改字段
            } else {
                # 原来是附表的字段
                if ($field['if_is_data'] == 1) {
                    $tablename .= '_data';
                }
                # 判断字段名是否更改
                if ($name != $field['if_name']) {
                    $where = [
                        'im_id' => $field['im_id'],
                        'if_name' => $name,
                    ];
                    $res = $DB->where($where)->value('if_id');
                    if ($res) {
                        $this->json('01', $name.'：该字段名已使用！');
                    }
                }
                # 三大要素不一样，就修改字段
                if ($name != $field['if_name']) {
                    if ($type2 == 'mediumtext') {
                        $sql="ALTER TABLE ".$tablename." change ".$field['if_name']." ".$name." ".$type2.";";
                    }else{
                        $sql="ALTER TABLE ".$tablename." change ".$field['if_name']." ".$name." ".$type2."(".$length.");";
                    }
                    $sql = str_replace('"','',$sql);
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->json('01', '字段名称修改失败！');
                    }
                }
                if ($length != $field['if_length'] || $type != $field['if_type'])  {
                    if ($type2=='mediumtext') {
                        $sql="ALTER TABLE ".$tablename." MODIFY ".$name." ".$type2.";";
                    } else {
                        $sql="ALTER TABLE ".$tablename." MODIFY ".$name." ".$type2."(".$length.");";
                    }
                    # 修改字段类型
                    $sql = str_replace('"','',$sql);
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->json('01', '字段类型长度修改失败！');
                    }
                }
                # 判断唯一是否被更改
                if($only != $field['if_only']){
                    if($only == 1){
                        $sql = 'alter table "'.$tablename.'" add unique ("'.$name.'");';
                    } else {
                        $sql = 'alter table "'.$tablename.'" DROP INDEX "'.$field['if_name'].'";';
                    }
                    $sql = str_replace('"','',$sql);                         
                    $res = Db::execute($sql);
                    if ($res===false) {
                        $this->json('01', '唯一索引修改失败');
                    }
                }
            }
            
            # 入库做记录
            $data = [
                'if_type'     => $type,
                'if_name'     => $name,
                'if_title'    => $title,
                'if_length'   => $length,
                'if_des'      => $des,
                'if_text'     => $text,
                'if_content'  => $content,
                'if_default'  => $default,
                'if_min'      => $min,
                'if_max'      => $max,
                'if_regular'  => $regular,
                'if_alert'    => $alert,
                'if_notnull'  => $notnull,
                'if_only'     => $only,
                'if_is_data'  => $is_data,
            ];
            $res = $DB->where('if_id', $id)->update($data);
            if ($res!==false) {
                $this->addLog(56, '修改成功', 1, false);
                $this->json('00', '修改成功');
            }

            $this->addLog(56, '修改失败', 2, false);
            $this->json('01', '修改失败');
        }else{
            $this->assign('info', $field);
            $status = Db::name('item_model')->where('im_id', $field['im_id'])->value('im_class');
            $this->assign('status', $status);
			return $this->fetch();
		}
    }

}