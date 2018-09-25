<?php
/**
 * 策略模式
 * 对象的某个行为在不同的场景中，该行为有不同的实现。给对象的方法传递不同的对象来实现
 * In Strategy(策略) pattern, a class behavior or its algorithm can be changed at run time.
 * 也可以传入俩个不同类型的类，来组织数据
 * 把 一个 模块 所 依赖 的 某类 算法 委 交 其他 模块 实现。
 */

namespace Dp\strategy;

interface Strategy
{
    function doOperation($num1, $num2);
}

class OperationAdd implements Strategy
{
    function doOperation($num1, $num2)
    {
        return $num1 + $num2;
    }
}

class OperationSubtract implements Strategy
{
    function doOperation($num1, $num2)
    {
        return $num1 - $num2;
    }
}

class Context
{
    public $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    function executeStrategy($num1, $num2)
    {
        return $this->strategy->doOperation($num1, $num2);
    }
}

$r1 = (new Context(new OperationAdd()))->executeStrategy(1, 2);
$r2 = (new Context(new OperationSubtract()))->executeStrategy(1, 3);
var_dump($r1);
var_dump($r2);


/**
 * 策略模式  常和工厂模式一起用 通过new 不同对象 返回结果
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/4
 * Time: 23:58
 */
abstract class FileNameStrategy
{
    abstract function createName();
}

class ZipFileStrategy extends FileNameStrategy
{
    function createName()
    {
        return "zip";
    }

}

class TarFileStrategy extends FileNameStrategy
{
    function createName()
    {
        return "tar";
    }

}

if (isset($_SERVER['HTTP_USER_AGENT']) && strstr($_SERVER['HTTP_USER_AGENT'], 'win')) {
    $fileObj = new ZipFileStrategy();
} else {
    $fileObj = new TarFileStrategy();
}
var_dump($fileObj->createName());
