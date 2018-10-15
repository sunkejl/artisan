<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* This function rewinds a directory
*/
function rewindDir() {
    /**
    * Global variable which holds the directory object
    * @global object Dir $dir Instance of class Dir
    */
    global $dir;

    $dir->rewind();
}


/**
* Example to document a global variable
* @name $foo
* @global string $GLOBALS['foo']
*/
$GLOBALS['foo'] = "Foobar";
?>
