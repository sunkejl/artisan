<?php
class MySpace
{
    public $name;
}

$mySpace = new MySpace();
$mySpace->name = "a";
//类是引用传递
$mySpaceOther = $mySpace;
var_dump($mySpaceOther->name);