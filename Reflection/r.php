<?php

//反射机制来间接地访问private成员，更是明显地破坏了封装，属特殊的场合用法。

/**
 * cc
 */
class A
{
    const A = 1;
    const B = 2;
    private $name = 123;

    /**
     * abc
     */
    private function getName()
    {
        echo 33;
    }
}

$r = new ReflectionClass("A");
var_dump($r);
var_dump($r->getProperties());
var_dump($r->getConstants());
var_dump($r->getDocComment());

$method = $r->getMethod('getName');//获得函数的注释 annotation
var_dump($method->getDocComment());