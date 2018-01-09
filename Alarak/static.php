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
//What is the difference between new self and new static?
//self refers to the same class in which the new keyword is actually written.
//
//static, in PHP 5.3's late static bindings, refers to whatever class in the hierarchy you called the method on.
//
//    In the following example, B inherits both methods from A. The self invocation is bound to A because it's defined in A's implementation of the first method, whereas static is bound to the called class (also see get_called_class()).
//
//class A {
//    public static function get_self() {
//        return new self();
//    }
//
//    public static function get_static() {
//        return new static();
//    }
//}
//
//class B extends A {}
//
//echo get_class(B::get_self());  // A
//echo get_class(B::get_static()); // B
//echo get_class(A::get_self()); // A
//echo get_class(A::get_static()); // A
    }

    function getNum()
    {
        return 123;
    }

    function getAge()
    {
        return $this->age;
    }
}

$self = Storm::getSelf();
var_dump($self->getAge());
$num = Storm::getName();//如果这个类的方法中没有用到$this，这个方法没有声明为static，也可以认为是static的。
var_dump($num);


echo Storm::$name . PHP_EOL;
echo Storm::getName();
$storm = new Storm();
echo $storm::getName();
echo PHP_EOL;
Storm::$name = 222;
$storm = new Storm();
echo $storm::getName();
echo PHP_EOL;

function my_func()
{
    static $count = 4;
    $count++;
    echo $count, "\n";
}

my_func();//5
my_func();//6
