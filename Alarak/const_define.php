<?php
//常量 定义了不能更改
//都是PHP Notice: 级别的错误
const A = 1;
define("B", 1);
define("B", 2);
const A = 2;
var_dump(A);
var_dump(B);
