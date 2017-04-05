<?php
/**
 * 最经常用作回调函数（callback）参数的值。
 * php>5.3
 * http://php.net/manual/zh/class.closure.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 11:45
 */
$closure = function ($name) {
    return sprintf("hello %s",$name);
};
#var_dump($closure);闭包类
echo $closure("abc");
