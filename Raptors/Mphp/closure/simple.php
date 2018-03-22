<?php
/**
 * 最经常用作回调函数（callback）参数的值。
 * php>5.3
 * http://php.net/manual/zh/class.closure.php
 */
$closure = function ($name) {
    return sprintf("hello %s",$name);
};
#var_dump($closure);闭包类
echo $closure("abc");
