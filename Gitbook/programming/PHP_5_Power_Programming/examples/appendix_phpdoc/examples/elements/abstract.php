<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Example class to show @abstract
*
* Abstract class to add two elements
*
* @package Examples
* @abstract
*/
class Sum {

    /**
    * Sum function
    * 
    * This function adds two elements and stores the result
    *
    * @abstract
    * @param mixed $e1  The first element
    * @param mixed $e2  The second element
    */
    function Sum ($e1, $e2) {
        ;
    }
}

/**
* Example inherited class
* 
* Add two arrays
* @package Examples
*/
class SumArray extends Sum {

    /**
    * Add two arrays
    *
    * @param array $a1  The first array
    * @param array $a2  The second array
    */
    function Sum ($a1, $a2) {
        return array_merge($a1, $a2);
    }
}
?>
