<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Class foo that does static bar
* @package Examples
*/
class static_foo {
    /**
    * This function may be called statically
    * @static
    */
    function bar () {
    }
}

static_foo::bar();
?>
