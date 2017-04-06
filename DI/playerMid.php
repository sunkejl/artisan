<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/6
 * Time: 15:00
 */
namespace DI;

interface  Capability
{
    public function skill(array $skill);
}

class pass implements Capability
{
    public function skill(array $skill)
    {
        return "pass";
    }
}

class shoot implements Capability
{
    public function skill(array $skill)
    {
        return "shoot";
    }
}

class player
{
    public $ability;

    public function __construct(Capability $ability)
    {
        $this->ability = $ability;
    }
}

$pass = new pass();
$shoot = new shoot();
$passPlayer = new player($pass);
$shootPlayer = new player($shoot);
var_dump($passPlayer->ability->skill([]));
var_dump($shootPlayer->ability->skill([]));



//依赖，只要不是由内部生产（比如初始化、构造函数 __construct 中通过工厂方法、自行手动 new 的），而是由外部以参数或其他形式注入的，都属于 依赖注入（DI）
//手动创建 手动注入