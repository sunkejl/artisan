<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Adds numbers
* @see string::add()
*/
function addNumbers ($number1, $number2)
{
    return $number1 + $number2;
}

/**
* String manupulation class
* @package Examples
*/
class string {
    /**
    * Adds strings
    * @see addNumbers
    */
    function add ($string1, $string2)
    {
        return $string1 . $string2;
    }
}
?>
