<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 17:04
 * https://github.com/Seldaek/monolog
 * https://silex.sensiolabs.org/doc/2.0/providers/monolog.html
 */

namespace Ek\Lib;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    public function writeLog()
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('/opt/www/artisan/Eknus/Log/2017.log', Logger::WARNING));

        return $log;
    }
}