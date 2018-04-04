<?php

class C
{
    public $cName = 2;
}

class MySpace
{
    public $name;
    private $age;

    function __construct()
    {
        $this->age = new C();
    }

    public function getAge()
    {
        return $this->age;//说不 能 直接 返回 类 的 内部 对象。用户 可以 在调 用此 方法 后 直接 对 生日 进行 操作， 从而 破坏 了 信息 隐藏 的 规则。
        //return ($this->age ! empty new C());

    }
}

$mySpace = new MySpace();
$mySpace->name = "a";
$age = $mySpace->getAge();
var_dump($age);
$age->cName = "重置对象内容";
var_dump($mySpace->name);
var_dump($mySpace->getAge());

//类是引用传递
$mySpaceOther = $mySpace;
var_dump($mySpaceOther->name);