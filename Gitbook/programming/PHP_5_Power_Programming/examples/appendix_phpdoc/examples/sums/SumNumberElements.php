<?php
/**
* @author Derick Rethans <derick@php.net>
* @package PHPDocExample
*/
/**
* Class for adding arrays of numbers
* Class for adding arrays of numbers
* @author Derick Rethans <derick@php.net>
* @copyright © 2002 by Derick Rethans
* @version $Id: $
* @package PHPDocExample
* @final
*/
class SumNumberElements extends Sum {
    /**
    * Function which sets the result for the Summation
    * Function which sets the result for the Summation
    * @param mixed $elem1  The first element
    * @param mixed $elem2  The second element
    * @access public
    */
    function sumElements ($elem1, $elem2)
    {
        /* Uses the sumElements utility function */
        $this->result = sumElements ($elem1, $elem2);
    }
}
?>
