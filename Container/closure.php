<?php
$closure = function ($name) {
    return 'Hello ' . $name;
};
echo $closure('world');
var_dump($closure);