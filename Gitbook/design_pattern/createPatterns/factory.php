<?php

/**
 * 工厂模式
 * 工厂类 创建你需要的对象的类
 * a class simply creates the object you want to use
 * 后续需要更改，重命名或替换 Automobile 类，你只需要更改工厂类中的代码，而不是在每一个用到 Automobile 类的地方修改；
 * 其次，如果创建对象的过程很复杂，你也只需要在工厂类中写，而不是在每个创建实例的地方重复地写。
 * 定义一个创建对象的接口，但让实现这个接口的类来决定实例化哪个类。工厂方法让类的实例化推迟到子类中进行。
 *
 * 工厂方法模式 factory method pattern
 *
 * 定义一个创建对象的接口 但由子类决定要实例化的类是哪个，把类的实例化推迟到子类 新需求时主类（创建者）就不需要变化
 * 通过让子类决定创建该创建的的对象是什么，来达到将该对象创建的过程封装的目的
 * 创建对象的代码集中在一个对象和方法里 避免代码重复 实例化时只依赖接口，而不是具体的类 针对接口编程 不是针对实现编程
 * 把创建对象的代码围起来
 *
 *
 * 多态（OOP不是简单的吧函数和数据简单的结合起来，而是用类和继承来描述）
 * 多态和基类的使用是oop的核心，但有一些情况需要创建基类的子类的一个具体实例 通过工厂模式来实现
 * 一个工厂模式拥有一个静态方法 用来接受输入 并根据输入觉得该创建哪个子类的实例
 * 比策略模式多了一层封装
 */

namespace Dp\factory;

class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory
{
    public static function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}

// 用工厂的 create 方法创建 Automobile 对象
$obj = AutomobileFactory::create('Bugatti', 'V');

print_r($obj->getMakeAndModel()); // outputs "Bugatti V"


interface Shape
{
    function draw();
}

class Square implements Shape
{
    function draw()
    {
        return "square";
    }
}

class Circle implements Shape
{
    function draw()
    {
        return "circle";
    }
}

class ShapeFactory
{
    function getShape($shapeType)
    {
        switch ($shapeType) {
            case "square":
                return new Square();
                break;
            case "circle";
                return new Circle();
                break;

        }
    }
}

$sharpFactory = new ShapeFactory();
$square = $sharpFactory->getShape("square")->draw();


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




