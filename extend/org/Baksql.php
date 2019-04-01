<?php
// +----------------------------------------------------------------------
// | 数据库备份
// +----------------------------------------------------------------------
// | Copyright (c) 2018 https://blog.junphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小黄牛 <1731223728@qq.com>
// +----------------------------------------------------------------------

namespace org;

class Baksql {

    private $config=[];
    private $handler;
    
    private $tables = array();// 需要备份的表
    private $begin;           // 开始时间
    private $error;           // 错误信息

    public function __construct($config) {
        $config['path']="databak/";                         // 默认目录 
        $config["sqlbakname"]=date("YmdHis",time()).".sql"; // 默认保存文件
        $this->config = $config;
        
        $this->begin = microtime(true);
        header("Content-type: text/html;charset=utf-8");
        $this->connect();
    }
    //首次进行pdo连接
    private function connect() {
        try{
           $this->handler =new \PDO("{$this->config['type']}:host={$this->config['hostname']};port={$this->config['hostport']};dbname={$this->config['database']};",
                $this->config['username'],
                $this->config['password'], 
                array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->config['charset']};",
                    \PDO::ATTR_ERRMODE =>  \PDO::ERRMODE_EXCEPTION, 
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                )); 
        }catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        
    }

    /**
     * 将sql导入到数据库（普通导入）
     *
     * @param string $sqlfile
     * @return boolean
    */
    public function _import($sqlfile) {
        $sqlfile = $this->config['path'].$sqlfile.'.sql';
        # sql文件包含的sql语句数组
        $sqls = array ();
        $f = fopen ( $sqlfile, "rb" );
        # 创建表缓冲变量
        $create_table = '';
        while ( ! feof ( $f ) ) {
            # 读取每一行sql
            $line = fgets ( $f );
            // 这一步为了将创建表合成完整的sql语句
            // 如果结尾没有包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)
            if (! preg_match ( '/;/', $line ) || preg_match ( '/ENGINE=/', $line )) {
                // 将本次sql语句与创建表sql连接存起来
                $create_table .= $line;
                // 如果包含了创建表的最后一句
                if (preg_match ( '/ENGINE=/', $create_table)) {
                    //执行sql语句创建表
                    $this->_insert_into($create_table);
                    // 清空当前，准备下一个表的创建
                    $create_table = '';
                }
                // 跳过本次
                continue;
            }
            //执行sql语句
            $this->_insert_into($line);
        }
		$this->_insert_into($line);
        fclose ( $f );
        return true;
    }

    # 插入单条sql语句
    private function _insert_into($sql){
        if ($sql) {
            $sql = trim ( $sql );
            $pdo = $this->handler;
            $pdo->query($sql);
        }
    }

    /******************************************************************** 数据库导入 stop ****************************************************************************/
    /**
     * 锁定数据库，以免备份或导入时出错
    */
    private function lock($op = "WRITE") {
        $pdo = $this->handler;
        $res = $pdo->query( "lock tables " . $this->config['database'] . " " . $op );
        if ($res) {
            return true;
        }
        return false;
    }
    // 解锁
    private function unlock() {
        $pdo = $this->handler;
        $res = $pdo->query( "unlock tables" );
        if ($res) {
            return true;
        }
        return false;
    }


     /**
     * 查询
     * @param string $sql
     * @return mixed
     */
    private function query($sql = '')
    {
        $stmt = $this->handler->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_NUM);
        $list = $stmt->fetchAll();
        return $list;
    }
     /**
     * 获取全部表
     * @param string $dbName
     * @return array
     */
    public function get_dbname($dbName = '*') {
         $sql = 'SHOW TABLES';
        $list = $this->query($sql);
        $tables = array();
        foreach ($list as $value)
        {   
            $tables[] = $value[0];
        }
        return $tables;        
    }
    /**
     * 获取表定义语句
     * @param string $table
     * @return mixed
     */
    private function get_dbhead($table = '')
    {
        $sql = "SHOW CREATE TABLE `{$table}`";
        $ddl = $this->query($sql)[0][1] . ';';
        return $ddl;
    }
    /**
     * 获取表数据
     * @param string $table
     * @return mixed
     */
    private function get_dbdata($table = '')
    {
        $sql = "SHOW COLUMNS FROM `{$table}`";
        $list = $this->query($sql);
        //字段
        $columns = '';
        //需要返回的SQL
        $query = '';
        foreach ($list as $value)
        {
            $columns .= "`{$value[0]}`,";
        }
        $columns = substr($columns, 0, -1);
        $data = $this->query("SELECT * FROM `{$table}`");
        foreach ($data as $value)
        {
            $dataSql = '';
            foreach ($value as $v)
            {
                $dataSql .= "'{$v}',";
            }
            $dataSql = substr($dataSql, 0, -1);
            $query .= "INSERT INTO `{$table}` ({$columns}) VALUES ({$dataSql});\r\n";
        }
        return $query;
    }
    /**
     * 写入文件
     * @param array $tables
     * @param array $ddl
     * @param array $data
     */
    private function writeToFile($tables = array(), $ddl = array(), $data = array())
    {
        $str = "/*\r\nMySQL Database Backup Tools\r\n";
        $str .= "Server:{$this->config['hostname']}:{$this->config['hostport']}\r\n";
        $str .= "Database:{$this->config['database']}\r\n";
        $str .= "Data:" . date('Y-m-d H:i:s', time()) . "\r\n*/\r\n";
        $str .= "SET FOREIGN_KEY_CHECKS=0;\r\n";
        $i = 0;
        foreach ($tables as $table)
        {
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Table structure for {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "DROP TABLE IF EXISTS `{$table}`;\r\n";
            $str .= $ddl[$i] . "\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Records of {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= $data[$i] . "\r\n";
            $i++;
        }
              
        if(!file_exists($this->config['path'])){mkdir($this->config['path']);}
        return file_put_contents($this->config['path'].$this->config['sqlbakname'], $str) ? '备份成功!花费时间' . round(microtime(true) - $this->begin,2) . 'ms' : '备份失败!';
    }
    /**
     * 设置要备份的表
     * @param array $tables
     */
    private function setTables($tables = array())
    {
        if (!empty($tables) && is_array($tables))
        {
            //备份指定表
            $this->tables = $tables;
        }
        else
        {
            //备份全部表
            $this->tables = $this->get_dbname();
        }
    }
    /**
     * 备份
     * @param array $tables
     * @return bool
     */
    public function backup($tables = array(),$filename='')
    {
        /* 有参数时间使用参数作为表明*/
        if($filename){
            $this->config["sqlbakname"] = $filename.".sql";
        }
        //存储表定义语句的数组
        $ddl = array();
        //存储数据的数组
        $data = array();
        $this->setTables($tables);
        if (!empty($this->tables))
        {
            foreach ($this->tables as $table)
            {
                $ddl[] = $this->get_dbhead($table);
                $data[] = $this->get_dbdata($table);
            }
            
            //开始写入
            return $this->writeToFile($this->tables, $ddl, $data);
        }
        else
        {
            $this->error = '数据库中没有表!';
            return false;
        }
    }
    /**
     * 错误信息
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
    public function restore($filename = '')
    {
        $path=$this->config['path'].$filename;
        if (!file_exists($path))
        {
            $this->error('SQL文件不存在!');
            return false;
        }
        else
        {
            $sql = $this->parseSQL($path);
            //dump($sql);die;
            try
            {
                $this->handler->exec($sql);
                echo '还原成功!花费时间', round(microtime(true) - $this->begin,2) . 'ms';
            }
            catch (PDOException $e)
            {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }
 
    /**
     * 解析SQL文件为SQL语句数组
     * @param string $path
     * @return array|mixed|string
     */
    private function parseSQL($path = '')
    {
        $sql = file_get_contents($path);
        $sql = explode("\r\n", $sql);
        //先消除--注释
        $sql = array_filter($sql, function ($data)
        {
            if (empty($data) || preg_match('/^--.*/', $data))
            {
                return false;
            }
            else
            {
                return true;
            }
        });
        $sql = implode('', $sql);
        //删除/**/注释
        $sql = preg_replace('/\/\*.*\*\//', '', $sql);
        return $sql;
    }
    /**
     * 下载备份
     * @param string $fileName
     * @return array|mixed|string
     */
    public function downloadFile($fileName) {
        $fileName=$this->config['path'].$fileName;
        if (file_exists($fileName)){
            ob_end_clean();
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Disposition: attachment; filename=' . basename($fileName));
            readfile($fileName);
        }else{
            $this->error="文件有错误！";
        }

    }
    /**
     * 获取文件是时间
     * @param string $file
     * @return string
     */
    private function getfiletime($file){
        $path=$this->config['path'].$file;
        $a = filemtime($path);
        $time = date("Y-m-d H:i:s", $a);
        return $time;
    }
    /**
     * 获取文件是大小
     * @param string $file
     * @return string
     */
    private function getfilesize($file){
        $perms=stat($this->config['path'].$file);
        $size = $perms['size'];
        $a    = ['B', 'KB', 'MB', 'GB', 'TB'];
        $pos  = 0;
        while ($size >= 1024) {
            $size /= 1024;
            $pos++;
        }
         $size = round($size, 2). $a[$pos];
    }

    /**
     * 获取文件大小
     * @param string $file
     * @return string
     */
    public function get_size($file){
        $perms = stat($this->config['path'].$file.'.sql');
        $size = $perms['size'];
        return $size / 1024;
        return $perms['size'];
    }
    
    /**
     * 获取文件列表
     * @param string $Order 级别
     * @return array
     */
    public function get_filelist($Order = 0) {
        $FilePath=$this->config['path'];
        $FilePath = opendir($FilePath);
        $FileAndFolderAyy=array();
        $i=1;
        while (false !== ($filename = readdir($FilePath))) {
            if ($filename!="." && $filename!=".."){
                $i++;
                $FileAndFolderAyy[$i]['name'] = $filename;
                $FileAndFolderAyy[$i]['time'] = $this->getfiletime($filename);
                $FileAndFolderAyy[$i]['size'] = $this->getfilesize($filename);
            }
            
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

    /**
     * 获取最新的完全备份文件
     * @return string 文件地址
     */
    public function get_completely(){
        $list = $this->get_filelist();
        $url  = '';
        $num  = 2;
        foreach ($list as $v) {
            $array = explode('.sql', $v['name']);
            if (is_numeric($array[0]) && $array[0] > $num ) {
                $url  = $v['name'];
                $num  = $array[0];
            }
        }
        return $url;
    }

    public function delfilename($filename){
        $path=$this->config['path'].$filename;          
        if (@unlink($path)) {return '删除成功';}
    }
}

?>