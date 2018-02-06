<?php
//http://php.net/manual/zh/features.gc.refcounting-basics.php
$a=123;
xdebug_debug_zval("a");
$b=$a;
xdebug_debug_zval("a");
