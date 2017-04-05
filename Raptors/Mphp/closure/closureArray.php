<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 11:45
 * closure
 */
$numbersPlusOne = array_map(function ($number) {
    return $number + 1;
}, [1, 2, 3]);
print_r($numbersPlusOne);

$plusOne = array_map(function ($v) {
    return ++$v;
}, range("a", "z"));
print_r($plusOne);

