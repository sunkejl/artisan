<?php

/**
 * decoratePattern
 * 装饰者模式 ：动态地将责任附加到对象上 若要扩展功能，装饰者提供了比继承更有弹性的替代方案。
 * 开放-关闭原则 类应该对扩展开放，对修改关闭 装饰者模式是一个例子
 * 每当有新的行为 通过新建装饰者 就不用修改原有的代码
 * 拿到一个浓咖啡对象，以摩卡 或者 牛奶来装饰它
 * 装饰者 就是对类的扩展 和被装饰者有相同的超类 可以修改被装饰者 甚至取代被装饰者 可以用无数的装饰者包装一个组件
 * 会导致程中出现很多小对象 过度使用会使程序变得复杂
 * @beverage 饮料
 * @houseBend 混合
 * @Espresso 浓咖啡
 * @CondimentDecorator 调味品
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/14
 * Time: 19:54
 */
abstract class Beverage
{
    private $description = "unknow";

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    abstract function cost();
}

abstract class CondimentDecorator extends Beverage
{
    /**
     * @var
     */
    private $beverage;
    /**
     * @var
     */
    private $name;

    /**
     * CondimentDecorator constructor.
     * @param $beverage
     * @param $name
     */
    public function __construct($beverage, $name)
    {
        $this->beverage = $beverage;
        $this->name = $name;
    }

    /**
     * 所有调料装饰者必须重新实现getDescription
     * @return string
     */
    public function getDescription()
    {
        return $this->beverage->getDescription()."+".$this->name;
    }

}

/**
 * Class Espresso  浓咖啡 咖啡类型
 */
class Espresso extends Beverage
{

    public function __construct()
    {
        $this->setDescription("浓咖啡");
    }

    function cost()
    {
        return 1.99;
    }
}

/**
 * Class HouseBlend 混合  咖啡类型
 */
class HouseBlend extends Beverage
{
    public function __construct()
    {
        $this->setDescription("混合咖啡");
    }

    function cost()
    {
        return 1.89;
    }
}

/**
 * Class Mocha 调料装饰者
 */
class Mocha extends CondimentDecorator
{
    /**
     * @var Beverage
     */
    private $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
        parent::__construct($beverage, "摩卡");
    }

    function cost()
    {
        return 0.20 + $this->beverage->cost();
    }

}

/**
 * Class Milk 调料装饰者
 */
class Milk extends CondimentDecorator
{
    /**
     * @var Beverage
     */
    private $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
        parent::__construct($beverage, "牛奶");
    }

    function cost()
    {
        return 0.40 + $this->beverage->cost();
    }

}

$espresso = new Espresso();
$houseBlend = new HouseBlend();
var_dump($espresso->getDescription());
var_dump($espresso->cost());
var_dump($houseBlend->getDescription());
var_dump($houseBlend->cost());
$mochaHouseBlend = new Mocha(new HouseBlend());
$mochaEspresso = new Mocha(new Espresso());
var_dump($mochaEspresso->getDescription());
var_dump($mochaEspresso->cost());
var_dump($mochaHouseBlend->getDescription());
var_dump($mochaHouseBlend->cost());
$milkHouseBlend = new Milk(new HouseBlend());
var_dump($milkHouseBlend->getDescription());
var_dump($milkHouseBlend->cost());
$mocha2Espresso = new Mocha(new Mocha(new Espresso()));
var_dump($mocha2Espresso->getDescription());
var_dump($mocha2Espresso->cost());
