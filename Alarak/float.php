<?php
//处理浮点型 不能用等号
//'2366.00'|'2366';
$a = 3038.00;
$b = 3038;
if(abs($a-$b) < 0.00001) {
    echo "true";
}
$v=bccomp($a,$b,2);
var_dump($v);
var_dump(ceil($a*100));
var_dump(ceil($b*100));
var_dump(ceil($a) == ceil($b));
