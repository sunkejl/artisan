<?php
//函数类里声明静态变量
//runs initialization code the first time (and only the first time) the function is run:
//
function test()
{
    static $a = 0;
    echo $a;
    $a++;
}

test();//0
test();//1
test();//2

class A{
    static $a =123;
    static function t(){
        return self::$a;
    }
}
$a=new A();
A::$a=456;
var_dump(A::t());//456

