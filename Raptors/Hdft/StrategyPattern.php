<?php

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
