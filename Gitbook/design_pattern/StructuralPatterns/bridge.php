<?php

/**
 * Bridge is used when we need to decouple an abstraction(抽象) from its implementation(实现) so that the two can vary independently(独立).
 * this pattern decouples implementation class and abstract class by providing a bridge structure between them.
 * 桥接  把对象的行为，特征分离开 各自可以独立变化
 *
 * 也称 柄/体（handle/body）模式
 *
 * 通过桥梁模式可以将接口与实现完全分开
 *
 * 抽象和实现可以独立改变
 *
 * 通过桥去选择对应的类
 * 通过依赖注入 把对应的对象进行传递
 *
 * 接口类实现接口 客户类里实例化需要的类 进行调用
 *
 * 信息隐藏虽能将抽象接口与具体实现分离，但仍然封装在同一类中
 * 桥梁模式则让二者彻底解耦（decouple），增强了对变化的适应力，具有更大的灵活性和可扩展性。
 *
 * 信息隐藏能将接口与实现从逻辑上分离 桥梁模式则进一步将二者从物理上分离 从而使代码具有更强的应变能力
 */
interface DrawAPI
{
    function draw($shape);
}

class RedCircle implements DrawAPI //imp 具体实现  理解dell 的xps和et
{
    function draw($shape)
    {
        return $shape.__CLASS__;
    }
}

class GreenCircle implements DrawAPI
{
    function draw($shape)
    {
        return $shape.__CLASS__;
    }
}

abstract class Shape
{
    abstract function draw();
}

class CircleDraw extends Shape     //抽象  理解为xps和et配的鼠标 如果增加了配件，不需要修改品牌的实现代码
{
    private $drawColor;

    public function __construct(DrawAPI $drawColor)
    {
        $this->drawColor = $drawColor;
    }

    function draw()
    {
        return $this->drawColor->draw(__CLASS__);
    }
}

class SquareDraw extends Shape{
    private $drawColor;

    public function __construct(DrawAPI $drawColor)
    {
        $this->drawColor = $drawColor;
    }

    function draw()
    {
        return $this->drawColor->draw(__CLASS__);
    }
}

$circleDraw = (new CircleDraw(new RedCircle()))->draw();
var_dump($circleDraw);

$squareDraw = (new SquareDraw(new GreenCircle()))->draw();

