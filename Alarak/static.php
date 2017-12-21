<?php

//声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
//static 常驻
class Storm
{
    static $name = 123;
    public $age = 12;

    static function getName()
    {
        return self::$name;
    }

    static function getSelf()
    {
        return new static();
    }

    function getAge()
    {
        return $this->age;
    }
}

$self = Storm::getSelf();
var_dump($self->getAge());

echo Storm::$name . PHP_EOL;
echo Storm::getName();
$storm = new Storm();
echo $storm::getName();
echo PHP_EOL;
Storm::$name = 222;
$storm = new Storm();
echo $storm::getName();
echo PHP_EOL;
