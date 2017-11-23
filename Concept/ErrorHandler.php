<?php
/**
 * 发生错误时控制错误输出 重定向只能没有任何输出前有效
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 15:55
 */
function myErrorHandler($errorNumber, $errorStr, $errorFile, $errorLine)
{
    var_dump($errorNumber);
    var_dump($errorStr);
    var_dump($errorFile);
    var_dump($errorLine);
    switch ($errorNumber){
        case E_USER_ERROR:
            var_dump($errorNumber);
            break;
        case E_USER_NOTICE:
            var_dump($errorNumber);
            break;
        case E_USER_WARNING:
            var_dump($errorNumber);
            break;
        default:
            var_dump($errorNumber);
            break;
    }
    return true;
}

set_error_handler("myErrorHandler");
#trigger_error("error trigger");
echo $a;
