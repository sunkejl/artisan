<?php

/**
 * 创建对象时 返回的是对象的句柄 是对象的ID号
 *
 *
 * 对象间等号是引用传递 通过clone进行复制传递
 *
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/24
 * Time: 17:25
 */
class foo
{
    /**
     *在发生clone时调用
     */
    function __clone()
    {
        echo "this is a clone object".PHP_EOL;
    }

    public $a = 0;
}

$obj1 = new foo();
$obj2 = $obj1;
$obj3 = clone $obj1;
$obj1->a = 10;
var_dump($obj2->a);
var_dump($obj3->a);
