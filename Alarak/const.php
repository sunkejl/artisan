<?php
const A = 1;
echo A;

class A
{
    function __construct()
    {
    }

    function getA()
    {
        define("A", 13);
        return A;
    }
}

$a = new A();
echo $a->getA();
// 会报错 A already deined in 13行