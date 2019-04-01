<?php
// +----------------------------------------------------------------------
// | 列表标签
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------
namespace app\common\tag;

use think\template\TagLib;
use think\Db;

class Ams extends TagLib {
    /**
     * 定义标签列表
     */
    protected $tags   =  [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        /**
         * table 表名
         * field 查询字段
         * join 是否连__data表
         * where 查询条件
         * page 是否分页
         * limit 每页记录数
         * order 排序
         * id 循环变量名
        */
        'list'      => ['attr' => 'table,field,join,where,page,limit,order,id', 'close' => 1, 'level' => 5], 
        
        /**
         * table 表名
         * field 字段名称
         * tag 选中标签的ID
         * num 返回多少个
         * id 循环变量名
        */
        'tag'      => ['attr' => 'table,field,tag,num,id', 'close' => 1, 'level' => 5], 
    ];

    /**
     * list标签
     */
    public function tagList($tag, $content) {
        $table  = $tag['table'];
        $tabledata = strtoupper($table.'_data');
        $field  = !empty($tag['field']) ? $tag['field'] : '*';
        $join   = !empty($tag['join']) ? $tag['join'] : 0;
        $limit  = !empty($tag['limit']) ? $tag['limit'] : 20;
        $id     = !empty($tag['id']) ? $tag['id'] : 'vo';
        # 判断是否链接附表
        if (!$join) {
            $list = "\\think\Db::name('{$table}')->field('{$field}')";
        } else {
            $field  = !empty($tag['field']) ? $tag['field'] : 'B.*, A.*';
            $list = "\\think\Db::name('{$table}')->alias('A')->join('__{$tabledata}__ B', 'A.id = B.pid')->field('{$field}')";
        }
        # 判断是否有查询条件
        if (!empty($tag['where'])) {
            $where = $tag['where'];
            $list .= '->where("'.$where.'")';
        }
        # 判断是否有排序
        if (!empty($tag['order'])) {
            $order = $tag['order'];
            $list .= "->orderRaw('{$order}')";
        }
        # 判断是否有分页
        if (!empty($tag['page'])) {
            $list .= "->paginate({$limit});";
        } else {
            $list .= "->limit({$limit})->select();";
        }

        $parse = '<?php ';
        $parse .= "\$test_arr= $list"; // 这里是模拟数据
        # 判断是否有分页
        if (!empty($tag['page'])) {
            $parse .= "\$page = \$test_arr->render();";
        }
        $parse .= '$__LIST__ = $test_arr;';
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $id . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }


    /**
     * tag标签
     */
    public function tagTag($tag, $content) {
        $table  = !empty($tag['table']) ? $tag['table'] : '';
        $field  = !empty($tag['field']) ? $tag['field'] : '';
        $num    = !empty($tag['num'])   ? $tag['num']-1 : 100;
        $id     = !empty($tag['id']) ? $tag['id'] : 'vo';
        $tag    = !empty($tag['tag']) ? $tag['tag'] : '';
        $time   = time();

        
        if (empty($table) || empty($field)) return false;
        
        $parse  = '<?php ';
        $parse .= "\$where_1024 = ['A.im_table'=>'{$table}', 'B.if_name'=>'{$field}'];"."\n";
        $parse .= "\$model_1024 = \\think\Db::name('item_model')->alias('A')->join('__ITEM_FIELD__ B', 'A.im_id = B.im_id')->where(\$where_1024)->field('B.if_content, B.if_is_data')->find();"."\n";
        $parse .= 'if (!empty($model_1024)) {'."\n";
        $parse .= '$tags_1024 = $model_1024["if_content"];'."\n";
        $parse .= '$return_1024 = [];'."\n";
        $parse .= '$right_1024 = [];'."\n";
        $parse .= '$array_1024 = explode(",", $tags_1024);'."\n";
        $parse .= '$t_1024 = 0;'."\n";
        $parse .= 'foreach ($array_1024 as $k_1024=>$v_1024) {'."\n";
        $parse .= '$i_1024 = explode("|", $v_1024);'."\n";
        $parse .= 'if ($t_1024<= '.$num.') {'."\n";
        $parse .= '$return_1024[$i_1024[0]] = $i_1024[1];'."\n";
        $parse .= '}'."\n";
        $parse .= '$right_1024[$i_1024[0]] = $i_1024[1];'."\n";
        $parse .= '$t_1024++;'."\n";
        $parse .= '}'."\n";

        if (!empty($tag)) {
            $parse .= 'if ($model_1024["if_is_data"] == 1) {'."\n";
            $parse .= '$Db_1024 = \think\Db::name("'.$table.'"."_data");'."\n";
            $parse .= '} else {'."\n";
            $parse .= '$Db_1024 = \think\Db::name("'.$table.'");'."\n";
            $parse .= '}'."\n";
            $parse .= '$tag_1024 = $Db_1024->where("id", '.$tag.')->value("'.$field.'");'."\n";
            $parse .= 'if (!empty($tag_1024)) {'."\n";
            $parse .= '$return_1024 = [];'."\n";
            $parse .= '$left_1024 = explode(",", $tag_1024);'."\n";
            $parse .= '$i_1024 = 0;'."\n";
            $parse .= 'foreach ($right_1024 as $k_1024=>$v_1024) {'."\n";
            $parse .= 'if (in_array($k_1024, $left_1024) && $i_1024<= '.$num.') {'."\n";
            $parse .= '$return_1024[$k_1024] = $v_1024;'."\n";
            $parse .= '}'."\n";
            $parse .= '$i_1024++;'."\n";
            $parse .= '}'."\n";
            $parse .= '}'."\n";
        }

        $parse .= '}'."\n";
        $parse .= '$__LIST__ = $return_1024;'."\n";
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $id . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }
}
