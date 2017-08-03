<?php

/**
 * 责任链
 * 解耦一个请求中的发送和接收，每个接收对象含有下一个接受对象,处理的命令对象传递给该链中的下一个处理对象
 * the chain of responsibility pattern creates a chain of receiver objects for a request.
 * This pattern decouples sender and receiver of a request based on type of request.
 * normally each receiver contains reference to another receiver.
 * If one object cannot handle the request then it passes the same to the next receiver and so on.
 */
abstract class AbstractLogger
{
    const INFO = 1;
    const DEBUG = 2;
    const ERROR = 3;

    public $level;
    public $nextLogger;

    public function setNextLogger(AbstractLogger $nextLogger)
    {
        $this->nextLogger = $nextLogger;
    }

    public function logMessage($level, $message)
    {
        if ($this->level <= $level) {
            $this->write($message);
        }
        if (!empty($this->nextLogger)) {
            $this->nextLogger->logMessage($level, $message);
        }
    }

    abstract function write($message);
}

class ConsoleLogger extends AbstractLogger
{

    public function __construct($level)
    {
        $this->level = $level;
    }

    function write($message)
    {
        echo __CLASS__ . $message . "\n";
    }
}

class FileLogger extends AbstractLogger
{

    public function __construct($level)
    {
        $this->level = $level;
    }

    function write($message)
    {
        echo __CLASS__ . $message . "\n";
    }
}

class ErrorLogger extends AbstractLogger
{

    public function __construct($level)
    {
        $this->level = $level;
    }

    function write($message)
    {
        echo __CLASS__ . $message . PHP_EOL;
    }
}

function getChain()
{
    $console = new ConsoleLogger(AbstractLogger::ERROR);
    $file = new FileLogger(AbstractLogger::ERROR);
    $error = new ErrorLogger(AbstractLogger::ERROR);
    $console->setNextLogger($file);
    $file->setNextLogger($error);
    return $console;
}

getChain()->logMessage(AbstractLogger::ERROR, "123");
