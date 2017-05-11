<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 16:49
 */
function myGenerator()
{
    yield 'value1';
    yield 'value2';
    yield 'value3';
}

foreach (myGenerator() as $value) {
    echo $value . PHP_EOL;
}