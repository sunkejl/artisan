<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 17:04
 */

namespace App\Providers;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    public function writeLog()
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('/opt/www/artisan/Eknus/var/logs/2017.log', Logger::WARNING));

        return $log;
    }
}