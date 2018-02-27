<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/6
 * Time: 16:33
 */
namespace DI_O;

class Shoot
{
    public $shoot;

    public function __construct()
    {
        $this->shoot = "shoot";
    }

}

class Pass
{
    public $pass;

    public function __construct()
    {
        $this->pass = "pass";
    }

}

class Player
{
    public $shoot;
    public $pass;

    public function __construct()
    {
        $shoot = new Shoot(); //依赖 多个类的时候 需要 实例化多个类
        $pass = new Pass();
        $this->shoot = $shoot;
        $this->pass = $pass;
    }
}

class starFactory
{
    function makeStar($skill)
    {
        switch ($skill) {
            case "shoot":
                return new Shoot();
                break;
            case "pass":
                return new Pass();
                break;
            default:
                return "";
                break;
        }
    }
}

class star
{
    public $skill;

    public function __construct(array $skillArray)
    {
        $starFactory = new starFactory();//使用工厂方法改进 减少new的次数
        foreach ($skillArray as $k => $v) {
            $this->skill[$v] = $starFactory->makeStar($v);
        }
    }

}

$star = new star(["shoot", "pass"]);
$shoot = $star->skill["shoot"];
var_dump($shoot->shoot);