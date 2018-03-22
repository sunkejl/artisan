<?php

/**
 * 异常处理
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