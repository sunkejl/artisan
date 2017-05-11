<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:44
 */
function my_autoloader($class)
{

    $file = 'src/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('my_autoloader');
$foo = new Bar();
var_dump($foo);

//// 或者，自 PHP 5.3.0 起可以使用一个匿名函数
//spl_autoload_register(function ($class) {
//    include 'classes/' . $class . '.class.php';
//});
