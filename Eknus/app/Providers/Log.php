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
    private $stream;
    private $name;

    public function __construct($stream = "/opt/www/artisan/Eknus/var/logs/2017.log", $name = "name")
    {
        $this->stream = $stream;
        $this->name = $name;
    }

    public function writeLog()
    {
        $log = new Logger($this->name);
        $log->pushHandler(new StreamHandler($this->stream, Logger::WARNING));

        return $log;
    }
}