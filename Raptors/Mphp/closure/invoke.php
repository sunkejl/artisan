<?php

/**
 * 当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 11:24
 */
class CallableClass
{
    function __invoke($x)
    {
        var_dump($x);
    }
}

$obj = new CallableClass();
$obj(5);
$fun = function () {
    return true;
};
var_dump(is_callable($fun));
var_dump(is_callable($obj));