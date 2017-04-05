<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 11:51
 */
function enclosePerson($name)
{
    return function ($doCommand) use ($name) {
        return sprintf('%s, %s', $name, $doCommand);
    };
}

$clay = enclosePerson('Clay');
echo $clay('get me sweet tea!');

function getName($name){
    return function ($age) use ($name){
        return sprintf("%s,%s",$name,$age);
    };
}

$nameFun=getName("myName");
echo  $nameFun("myAge");
