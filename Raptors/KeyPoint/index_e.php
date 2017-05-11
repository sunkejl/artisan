<?php
function test($a)
{
    echo $a;
}

call_user_func('test', 123);#把第一个参数作为回调函数调用
