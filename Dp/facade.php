<?php
/**
 * Facade pattern hides the complexities of the system and provides an interface to the client using which the client can access the system.
 * this pattern adds an interface to existing system to hide its complexities.
 *  门面模式
 */

namespace Dp\Facde;

interface shape
{
    function draw();
}

class Square implements Shape
{
    function draw()
    {
        return __CLASS__;
    }
}

class Circle implements shape
{
    function draw()
    {
        return __CLASS__;
    }
}

class FacadePattern
{
    private $square;
    private $circle;

    public function __construct()
    {
        $this->square = new Square();
        $this->circle = new Circle();
    }

    public function drawCircle()
    {
        return $this->circle->draw();
    }

    public function drawSquare()
    {
        return $this->square->draw();
    }
}

$facade = new FacadePattern();
echo sprintf("circle:%s\n", $facade->drawCircle());
echo sprintf("square:%s\n", $facade->drawSquare());




