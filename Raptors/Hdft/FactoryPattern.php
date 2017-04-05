<?php

/**
 * 多态（OOP不是简单的吧函数和数据简单的结合起来，而是用类和继承来描述）
 * 多态和基类的使用是oop的核心，但有一些情况需要创建基类的子类的一个具体实例 通过工厂模式来实现
 * 一个工厂模式拥有一个静态方法 用来接受输入 并根据输入觉得该创建哪个子类的实例
 * 比策略模式多了一层封装
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 1:20
 */
class User
{

    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function hasRead()
    {
        return true;
    }

    public function hasAdd()
    {
        return false;
    }
}

class AdminUser extends User
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function hasAdd()
    {
        return true;
    }

}

class Customer extends User
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

}

class UserFactory
{
    private static $user = ['sk' => 'admin', 'abc' => 'customer'];

    static function create($name)
    {
        if (!isset(self::$user[$name])) {
            throw new Exception("error");
        }
        switch (self::$user[$name]) {
            case 'admin':
                return new AdminUser($name);
                break;
            case 'customer':
                return new Customer($name);
                break;
        }
    }
}

$obj1 = UserFactory::create('sk');
var_dump($obj1->hasAdd());
$obj2 = UserFactory::create('abc');
var_dump($obj2->hasAdd());