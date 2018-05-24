<?php
/**
 * Flyweight(享元模式)
 * 减少对象的创建 把已创建的对象保存起来 供下次使用
 * 实现对象的共享
 * 和容器有区别 容器创造的对象是不同的对象，享元模式创造的对象是共享的对象
 * Flyweight pattern is primarily used to reduce the number of objects created and to decrease memory footprint and increase performance.
 * this pattern provides ways to decrease object count thus improving the object structure of application.
 * Flyweight pattern tries to reuse already existing similar kind objects by storing them and creates new object when no matching object is found.
 */

namespace Di\FlyWeight;

interface Shape
{
    function draw();
}

class Circle implements shape
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    function draw()
    {
        echo $this->color;
    }
}

class ShapeFactory
{
    public $shapeArray = array();

    public function getCircle($color)
    {
        if (empty($this->shapeArray[$color])) {
            $this->shapeArray[$color] = new Circle($color);
        }
        return $this->shapeArray[$color];
    }
}

$redCircle = new ShapeFactory();
$redCircle->getCircle("red")->draw();


