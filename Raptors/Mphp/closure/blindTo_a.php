<?php

/**
 * blindTo 创建并返回一个 匿名函数， 它与当前对象的函数体相同、绑定了同样变量，但可以绑定不同的对象，也可以绑定新的类作用域
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 15:38
 */
class A
{
    private $val;

    function __construct($val)
    {
        $this->val = $val;
    }

    function getClosure()
    {
        //returns closure bound to this object and scope
        return function () {
            return $this->val;
        };
    }
}

$ob1 = new A(1);
$ob2 = new A(2);

$cl = $ob1->getClosure();
echo $cl() . PHP_EOL;
$cl = $cl->bindTo($ob2);
echo $cl() . PHP_EOL;
