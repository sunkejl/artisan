<?php
/**
 * Decorator(装饰)  wraps(包装)
 * Decorator pattern allows a user to add new functionality to an existing object without altering its structure.
 * 在不改变已有类里的结构的情况下 添加新的功能 把存在的类包装一下
 * this pattern acts as a wrapper to existing class
 * This pattern creates a decorator class which wraps the original class and provides additional functionality keeping class methods signature intact.
 */

namespace Dp\Decorator;

interface Shape
{
    function draw();
}

class Circle implements Shape
{
    function draw()
    {
        echo __CLASS__;
    }
}

class Rectangle implements Shape
{
    function draw()
    {
        echo __CLASS__;
    }
}

abstract class ShapeDecorator
{
    protected $decoratedShape;

    public function __construct(Shape $decoratedShape)
    {
        $this->decoratedShape = $decoratedShape;
    }

    abstract function draw();
}

class RedShapeDecorator extends ShapeDecorator
{


    function draw()
    {
        $this->decoratedShape->draw();
        echo __CLASS__;
    }
}

class GreenShapeDecorator extends ShapeDecorator
{

    function draw()
    {
        $this->decoratedShape->draw();
        echo __CLASS__;
    }
}

$red = new RedShapeDecorator(new Circle());
$red->draw();
$green = new GreenShapeDecorator(new Rectangle());
$green->draw();
