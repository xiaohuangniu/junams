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
\think\Route::bind('index');

// 执行应用
\think\App::run()->send();