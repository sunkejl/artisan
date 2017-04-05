<?php

/**
 * 异常处理
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/3
 * Time: 23:45
 */
class ErrorPhoneException extends ErrorException
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

}

try {
    throw new ErrorPhoneException("errorPhone", 200);
} catch (ErrorPhoneException $e) {
    echo $e->getCode();
}