<?php
/**
 * 一个类别可以作为其它类的接口
 * In proxy pattern, a class represents functionality of another class.
 * create object having original object to interface its functionality to outer world.
 */

namespace Dp\Proxy;

interface Image
{
    function display($fileName);
}

class RealImage implements Image
{
    public function __construct()
    {
        $this->loading();
    }

    function display($fileName)
    {
        echo "display $fileName\n";
    }

    function loading()
    {
        echo "loading\n";
    }
}

class ProxyImage implements Image
{
    public $realImage;

    function display($fileName)
    {
        if (empty($this->realImage)) {
            $this->realImage = new RealImage();
        }
        $this->realImage->display($fileName);
    }
}

$proxy = new ProxyImage();
$proxy->display("foo.png");
$proxy->display("c.png");
