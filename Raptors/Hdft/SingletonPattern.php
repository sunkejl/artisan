<?php

/**
 * 单例模式
 * 返回唯一的实例，存在私有的静态变量中 返回以创建的实例句柄
 * __construct  _clone 设置为私有 防止开发者创建第二个实例
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 0:06
 */
class Logger
{
    private static $instance = null;

    private function __construct()
    {
    }

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    function log()
    {
        return "logging";
    }

    #_clone 设置为私有 防止开发者创建第二个实例
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

}

print Logger::getInstance()->log();
