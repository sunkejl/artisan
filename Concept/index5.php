<?php

/**
 * 属性和方法的重载
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/4
 * Time: 21:42
 */
class MyData
{
    private $arr = ['a' => null, 'b' => null];

    function __set($name, $value)
    {
        if (array_key_exists($name, $this->arr)) {
            $this->arr[$name] = $value;
        } else {
            var_dump("key not exist.set");
        }
    }

    function __get($name)
    {
        if (array_key_exists($name, $this->arr)) {
            return $this->arr[$name];
        } else {
            var_dump("key not exist.get");
        }
    }

    /**
     * 调用
     * @param $name
     * @param $arguments
     */
    function __call($name, $arguments)
    {
        var_dump($name);
        var_dump($arguments);
    }

}

$data = new MyData();
$data->a = 1;
var_dump($data->a);
$data->c = 2;
var_dump($data->c);
$data->a("abc");
