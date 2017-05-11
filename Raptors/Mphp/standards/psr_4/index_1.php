<?php
/**
 * 使用namespace composer 自动帮做的事情
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 14:16
 */

spl_autoload_register(function ($class) {
    $prefix = "Foo\\";
    $base_dir = __DIR__ . "/src/";
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len)) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace("\\", '/', $relative_class) . ".php";
    if (file_exists($file)) {
        require $file;
    }
});
$bar = new \Foo\Bar();//通过 spl_autoload_register 完成require 再 实例化
var_dump($bar);