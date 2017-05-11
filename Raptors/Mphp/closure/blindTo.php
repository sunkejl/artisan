<?php

/**
 * blindTo 创建并返回一个 匿名函数， 它与当前对象的函数体相同、绑定了同样变量，但可以绑定不同的对象，也可以绑定新的类作用域
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 15:38
 */
class Bar
{
    private $foo = 1; // initial value
}

$fn = function () {
    return ++$this->foo; // increase the value
};

$bar = new Bar();

//$fn1 = $fn->bindTo($bar); //  Cannot access private property Bar::$foo
$fn1 = $fn->bindTo($bar, 'Bar'); // specify class name
$fn2 = $fn->bindTo($bar, $bar); // or object

echo $fn1(); // 2
echo $fn2(); // 3
