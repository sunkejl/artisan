<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 18:35
 */
class MyClass{
    public $name="name";

    function __set($name, $value)
    {
        echo "set".PHP_EOL;
        $this->name="set";
    }

    function __get($name)
    {
        return "get";
    }

}

$obj=new MyClass();
$obj->undeefinedName="my name";
var_dump($obj->undeefinedName);
