<?php
/**
 * JunAMS安装程序
 *
 * 安装完成后建议删除此文件
 * @author 小黄牛
 * @website https://xiuxian.junphp.com
 */
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// ini_set('display_errors', '1');

// 定义目录分隔符
define('DS', DIRECTORY_SEPARATOR);
// 定义根目录
define('ROOT_PATH', dirname(__DIR__) . DS);
// 定义应用目录
define('APP_PATH', ROOT_PATH . 'application' . DS);
// 安装包目录
define('INSTALL_PATH', APP_PATH . 'admin' . DS . 'command' . DS . 'Install' . DS);
// 跳转根目录
define('URL_PATH', dirname(dirname($_SERVER['SCRIPT_NAME'])));

// 判断文件或目录是否有写的权限
function is_really_writable($file){
    if (DIRECTORY_SEPARATOR == '/' AND @ ini_get("safe_mode") == FALSE) {
        return is_writable($file);
    }
    if (!is_file($file) OR ($fp = @fopen($file, "r+")) === FALSE) {
        return FALSE;
    }

    fclose($fp);
    return TRUE;
}

$sitename = "JunAMS";
$link = array(
    'qqun'  => "tencent://message/?uin=1731223728&Site=在线QQ&Menu=yes",
    'forum' => 'https://blog.junphp.com',
);

//错误信息
$errInfo = '';
//数据库配置文件
$dbConfigFile = APP_PATH . 'database.php';
//安装文件
$dbConfigSql = ROOT_PATH.'public'.DS.'install.sql';

if (file_exists($dbConfigFile)) {
    $errInfo = "您当前已经安装{$sitename}";
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    $errInfo = "当前版本(" . PHP_VERSION . ")过低，请使用PHP5.5以上版本";
} else if (!extension_loaded("PDO")) {
    $errInfo = "当前未开启PDO，无法进行安装";
} else if (!file_exists($dbConfigSql)) {
    $errInfo = '当前安装包，缺少核心数据库文件';      
}
// 当前是POST请求
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (DS == '/') {
        # 判断文件是否为0777权限
        if (fileperms(ROOT_PATH.'index.php') != 33279) {
            die('入口文件必须设置为0777权限：'.ROOT_PATH.'index.php');
        }
        if (fileperms(ROOT_PATH.'public'.DS.'install.sql') != 33279) {
            die('JunAMS的安装文件必须设置为0777权限：'.ROOT_PATH.'public'.DS.'install.sql');
        }
        if (fileperms(ROOT_PATH.'extend'.DS.'weixin'.DS.'access_token.json') != 33279) {
            die('微信ACTOKEN缓存文件必须设置为0777权限：'.ROOT_PATH.'extend'.DS.'weixin'.DS.'access_token.json');
        }
        if (fileperms(ROOT_PATH.'extend'.DS.'weixin'.DS.'ssl_path'.DS.'apiclient_cert.pem') != 33279) {
            die('微信支付证书文件必须设置为0777权限：'.ROOT_PATH.'extend'.DS.'weixin'.DS.'ssl_path'.DS.'apiclient_cert.pem');
        }
        if (fileperms(ROOT_PATH.'extend'.DS.'weixin'.DS.'ssl_path'.DS.'apiclient_key.pem') != 33279) {
            die('微信支付密钥文件必须设置为0777权限：'.ROOT_PATH.'extend'.DS.'weixin'.DS.'ssl_path'.DS.'apiclient_key.pem');
        }

        # 判断目录是否为0777权限
        if (fileperms(ROOT_PATH.'runtime'.DS) != 16895) {
            die('ThinkPHP5框架的缓存目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'runtime'.DS);
        }
        if (fileperms(ROOT_PATH.'public'.DS.'home'.DS) != 16895) {
            die('静态文件目录必须设置为0777权限：'.ROOT_PATH.'public'.DS.'home'.DS." 主要用于项目导入");
        }
        if (fileperms(ROOT_PATH.'public'.DS.'cms'.DS) != 16895) {
            die('项目安装目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'public'.DS.'cms'.DS);
        }
        if (fileperms(ROOT_PATH.'public'.DS.'edit'.DS) != 16895) {
            die('JunAMS后台上传文件目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'public'.DS.'edit'.DS);
        }
        if (fileperms(ROOT_PATH.'public'.DS.'txt'.DS) != 16895) {
            die('JunAMS的CMD模块相关配置目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'public'.DS.'txt'.DS);
        }
        if (fileperms(ROOT_PATH.'public'.DS.'weixin_log'.DS) != 16895) {
            die('微信API日志目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'public'.DS.'weixin_log'.DS);
        }
        if (fileperms(ROOT_PATH.'application'.DS) != 16895 || fileperms(ROOT_PATH.'application'.DS.'config.php') != 33279) {
            die('项目目录【包括其子目录】必须设置为0777权限：'.ROOT_PATH.'application'.DS."  主要用于控制器生成，备份，修改等日常操作。");
        }
    }
    
    if ($errInfo) {
        echo $errInfo;
        exit;
    }

    $err = '';
    $mysqlHostname = isset($_POST['mysqlHost']) ? $_POST['mysqlHost'] : '127.0.0.1';
    $mysqlHostport = 3306;
    $hostArr = explode(':', $mysqlHostname);
    if (count($hostArr) > 1) {
        $mysqlHostname = $hostArr[0];
        $mysqlHostport = $hostArr[1];
    }
    $mysqlUsername = isset($_POST['mysqlUsername']) ? $_POST['mysqlUsername'] : 'root';
    $mysqlPassword = isset($_POST['mysqlPassword']) ? $_POST['mysqlPassword'] : '';
    $mysqlDatabase = isset($_POST['mysqlDatabase']) ? $_POST['mysqlDatabase'] : 'junams';
    $mysqlPrefix = isset($_POST['mysqlPrefix']) ? $_POST['mysqlPrefix'] : 'jun_';

    try {
        //检测能否读取安装文件
        $sql = @file_get_contents($dbConfigSql);
        if (!$sql) {
            throw new Exception("无法读取{$dbConfigSql}文件，请检查是否有读权限");
        }
        $sql = str_replace("`jun_", "`{$mysqlPrefix}", $sql);
        $pdo = new PDO("mysql:host={$mysqlHostname};port={$mysqlHostport}", $mysqlUsername, $mysqlPassword, array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));

        //检测是否支持innodb存储引擎
        $pdoStatement = $pdo->query("SHOW VARIABLES LIKE 'innodb_version'");
        $result = $pdoStatement->fetch();
        if (!$result) {
            throw new Exception("当前数据库不支持innodb存储引擎，请开启后再重新尝试安装");
        }
        $pdo->query("CREATE DATABASE IF NOT EXISTS `{$mysqlDatabase}` CHARACTER SET utf8 COLLATE utf8_general_ci;");
        $pdo->query("USE `{$mysqlDatabase}`");
        $pdo->exec($sql);
  
        
$config = "<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 数据库类型
    'type'            => 'mysql',
    // 服务器地址
    'hostname'        => '".$mysqlHostname."',
    // 数据库名
    'database'        => '".$mysqlDatabase."',
    // 用户名
    'username'        => '".$mysqlUsername."',
    // 密码
    'password'        => '".$mysqlPassword."',
    // 端口
    'hostport'        => '".$mysqlHostport."',
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '".$mysqlPrefix."',
    // 数据库调试模式
    'debug'           => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
];";

        //检测能否成功写入数据库配置
        $result = @file_put_contents($dbConfigFile, $config);
        if (!$result) {
            throw new Exception("无法写入数据库信息到application/database.php文件，请检查是否有写权限");
        }

        // 发送次数统计
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://xiuxian.junphp.com/junams/install.html');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);        
        $response = curl_exec($curl);
        curl_close($curl);

        @unlink($dbConfigSql);
        echo "success";
    } catch (PDOException $e) {
        $err = $e->getMessage();
    } catch (Exception $e) {
        $err = $e->getMessage();
    }
    echo $err;
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>安装<?php echo $sitename; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta name="renderer" content="webkit">
    <style>
        body{background:#fff;margin:0;padding:0;line-height:1.5}body,input,button{font-family:'Open Sans',sans-serif;font-size:16px;color:#7e96b3}.container{max-width:515px;margin:0 auto;padding:20px;text-align:center}a{color:#18bc9c;text-decoration:none}a:hover{text-decoration:underline}h1{margin-top:0;margin-bottom:10px}h2{font-size:28px;font-weight:normal;color:#3c5675;margin-bottom:0}form{margin-top:40px}.form-group{margin-bottom:20px}.form-group .form-field:first-child input{border-top-left-radius:4px;border-top-right-radius:4px}.form-group .form-field:last-child input{border-bottom-left-radius:4px;border-bottom-right-radius:4px}.form-field input{background:#edf2f7;margin:0 0 1px;border:2px solid transparent;transition:background .2s,border-color .2s,color .2s;width:100%;padding:15px 15px 15px 180px;box-sizing:border-box}.form-field input:focus{border-color:#18bc9c;background:#fff;color:#444;outline:0}.form-field label{float:left;width:160px;text-align:right;margin-right:-160px;position:relative;margin-top:18px;font-size:14px;pointer-events:none;opacity:.7}button,.btn{background:#3c5675;color:#fff;border:0;font-weight:bold;border-radius:4px;cursor:pointer;padding:15px 30px;-webkit-appearance:none}button[disabled]{opacity:.5}#error,.error,#success,.success{background:#d83e3e;color:#fff;padding:15px 20px;border-radius:4px;margin-bottom:20px}#success{background:#3c5675}#error a,.error a{color:white;text-decoration:underline}
    </style>
</head>

<body>
<div class="container">
    <h2>安装 <?php echo $sitename; ?></h2>
    <div>

        <p>若你在安装中遇到麻烦可点击 <a
                    href="<?php echo $link['forum']; ?>" target="_blank">交流社区</a> <a
                    href="<?php echo $link['qqun']; ?>">QQ交流群</a></p>
        <!--<p><?php echo $sitename; ?>还支持在命令行php think install一键安装</p>-->

        <form method="post">
            <?php if ($errInfo): ?>
                <div class="error">
                    <?php echo $errInfo; ?>
                </div>
            <?php endif; ?>
            <div id="error" style="display:none"></div>
            <div id="success" style="display:none"></div>

            <div class="form-group">
                <div class="form-field">
                    <label>MySQL 数据库地址</label>
                    <input type="text" name="mysqlHost" value="127.0.0.1" required="">
                </div>

                <div class="form-field">
                    <label>MySQL 数据库名</label>
                    <input type="text" name="mysqlDatabase" value="junams" required="">
                </div>

                <div class="form-field">
                    <label>MySQL 用户名</label>
                    <input type="text" name="mysqlUsername" value="root" required="">
                </div>

                <div class="form-field">
                    <label>MySQL 密码</label>
                    <input type="password" name="mysqlPassword">
                </div>

                <div class="form-field">
                    <label>MySQL 数据表前缀</label>
                    <input type="text" name="mysqlPrefix" value="jun_">
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label>管理者用户名-默认</label>
                    <input type="text" value="admin" disabled />
                </div>
                <div class="form-field">
                    <label>管理者密码-默认</label>
                    <input type="text" value="admin" disabled >
                </div>

            </div>

            <div class="form-buttons">
                <button type="submit" <?php echo $errInfo ? 'disabled' : '' ?>>点击安装</button>
            </div>
        </form>
        <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
        <script charset="UTF-8">
            $(function () {
                $('form :input:first').select();

                $('form').on('submit', function (e) {
                    e.preventDefault();
                    var $button = $(this).find('button')
                        .text('安装中...')
                        .prop('disabled', true);

                    $.post('', $(this).serialize())
                        .done(function (ret) {
                            if (ret === 'success') {
                                $('#error').hide();
                                $("#success").text("安装成功！开始你的<?php echo $sitename; ?>之旅吧！").show();
                                <?php
                                $index = str_replace('//', '/', URL_PATH.'/index.php');
                                $admin = str_replace('//', '/', URL_PATH.'/admin.php');
                                ?>
                                $('<a class="btn" href="<?PHP echo $index;?>">访问首页</a> <a class="btn" href="<?PHP echo $admin;?>" style="background:#18bc9c">访问后台</a>').insertAfter($button);
                                $button.remove();
                                localStorage.setItem("fastep", "installed");
                            } else {
                                $('#error').show().html(ret);
                                $button.prop('disabled', false).text('点击安装');
                                $("html,body").animate({
                                    scrollTop: 0
                                }, 500);
                            }
                        })
                        .fail(function (data) {
                            $('#error').show().text('发生错误:\n\n' + data.responseText);
                            $button.prop('disabled', false).text('点击安装');
                            $("html,body").animate({
                                scrollTop: 0
                            }, 500);
                        });

                    return false;
                });
            });
        </script>
    </div>
</div>
</body>
</html>