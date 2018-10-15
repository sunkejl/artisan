<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Example for static variable in a function
* @staticvar  integer $count  Count the number of times this function was called.
*/
function foo() {
    static $count;

    $count++;
    echo $count. "\n";
}

foo();
foo();
foo():
?>
