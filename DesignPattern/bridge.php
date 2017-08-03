<?php

/**
 * Bridge is used when we need to decouple an abstraction(抽象) from its implementation(实现) so that the two can vary independently(独立).
 * this pattern decouples implementation class and abstract class by providing a bridge structure between them.
 * 桥接  把对象的行为，特征分离开 各自可以独立变化
 */
interface DrawAPI
{
    function drawCircle();
}

class RedCircle implements DrawAPI
{
    function drawCircle()
    {
        return __CLASS__;
    }
}

class GreenCircle implements DrawAPI
{
    function drawCircle()
    {
        return __CLASS__;
    }
}

abstract class Shape
{
    abstract function draw();
}

class CircleDraw extends Shape
{
    private $drawColor;

    public function __construct(DrawAPI $drawColor)
    {
        $this->drawColor = $drawColor;
    }

    function draw()
    {
        return $this->drawColor->drawCircle();
    }
}

$circleDraw = (new CircleDraw(new RedCircle()))->draw();
var_dump($circleDraw);

