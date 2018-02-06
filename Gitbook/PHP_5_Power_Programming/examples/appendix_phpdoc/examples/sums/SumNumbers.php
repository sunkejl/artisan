<?php
/**
* @author Derick Rethans <derick@php.net>
* @package PHPDocExample
*/
/**
* Class for adding two numbers
* @author Derick Rethans <derick@php.net>
* @copyright © 2002 by Derick Rethans
* @version $Id: $
* @package PHPDocExample
* @final
*/
class SumNumbers extends Sum {
    /**
    * Functon to add numbers
    *
    * This functions adds numbers
    * @see sumElements()
    * @access private
    * @param integer $int1  The first number
    * @param integer $int2  The second number
    * @return integer
    */
    function _sumNumbers ($int1, $int2)
    {   
        return $int1 + $int2;
    }

    /**
    * Overloaded SumElements function
    *
    * Overloaded SumElements function
    * @access public
    * @param int $elem1  The first element
    * @param int $elem2  The second element
    */
    function sumElements ($elem1, $elem2)
    {
        $this->result = _sumNumbers ($elem1, $elem2);
    }
}
?>
