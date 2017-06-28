<?php

/**
 * 工厂模式
 * 需要一个用来创建你需要的对象的类
 * a class simply creates the object you want to use
 * 后续需要更改，重命名或替换 Automobile 类，你只需要更改工厂类中的代码，而不是在每一个用到 Automobile 类的地方修改；
 * 其次，如果创建对象的过程很复杂，你也只需要在工厂类中写，而不是在每个创建实例的地方重复地写。
 *
 */
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