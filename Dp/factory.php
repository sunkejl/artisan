<?php

/**
 * 工厂模式
 * 工厂类 创建你需要的对象的类
 * a class simply creates the object you want to use
 * 后续需要更改，重命名或替换 Automobile 类，你只需要更改工厂类中的代码，而不是在每一个用到 Automobile 类的地方修改；
 * 其次，如果创建对象的过程很复杂，你也只需要在工厂类中写，而不是在每个创建实例的地方重复地写。
 * 定义一个创建对象的接口，但让实现这个接口的类来决定实例化哪个类。工厂方法让类的实例化推迟到子类中进行。
 *
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

/**       */
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
            case "1":
                return new Square();
                break;
            case "2";
                return new Circle();
                break;

        }
    }
}

$sharpFactory = new ShapeFactory();
$square = $sharpFactory->getShape("square")->draw();