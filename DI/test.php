<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 16:03
 */
class Pass
{
    function index()
    {
        echo 333;
        return 22;
    }
}

$c = function () {
    return new Pass();
};
call_user_func($c)->index();

