<?php
$variable = 1;
var_dump((int)$variable);#int(1)
var_dump((array)$variable);#array(1) { [0] => int(1) }
var_dump((float)$variable);#double(1)
var_dump((double)$variable);#double(1)
var_dump((object)$variable);#class stdClass#1 (1) { public $scalar => int(1) }
