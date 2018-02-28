<?php
include __DIR__ . '/../vendor/autoload.php';
$database = [
'driver'    => 'mysql',
'host'      => '192.168.1.100',
'database'  => 'mindking',
'username'  => 'mindking',
'password'  => 'd1sj_dev',
'charset'   => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix'    => '',
];

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

// 创建链接
$capsule->addConnection($database);

// 设置全局静态可访问
$capsule->setAsGlobal();

// 启动Eloquent
$capsule->bootEloquent();