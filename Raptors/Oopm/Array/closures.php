<?php
    /**
     * 匿名函数 闭包
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/14
     * Time: 19:39
     */


    $array1 = array ("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5);
    $foo = [1];
    $result = array_filter($array1, function ($value) use ($foo) {
        var_dump($value);
        var_dump($foo);
        return (1==$value);
    });
    var_dump($result);
