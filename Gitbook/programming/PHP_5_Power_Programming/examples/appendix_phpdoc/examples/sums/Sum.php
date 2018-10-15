<?php
/** 
* This class adds things
* This class adds things
* @author Derick Rethans <derick@php.net>
* @copyright © 2002 by Derick Rethans
* @package PHPDocExample
*/
/**
* @author Derick Rethans <derick@php.net>
* @copyright © 2002 by Derick Rethans
* @version $Id: $
* @package PHPDocExample
* @since version 0.3
* @abstract
*/
class Sum {
    /**
    * @var string $type Type of the elements
    */
    var $type;

    /**
    * @var mixed $result Result of the summation
    */
    var $result;

    /**
    * Constructor
    * @param string $type  The type of the elements
    */
    function Sum ($type)
    {
        $this->type = $type;
    }

    /**
    * Sum elements
    *
    * Sums elements
    * @abstract
    * @param mixed $elem1  The first element
    * @param mixed $elem2  The second element
    */
    function sumElements ($elem1, $elem2)
    {
        return new SumError('Please overload this class');
    }

    /**
    * Return the result of the summation
    * @abstract
    * @return mixed
    */
    function getResult ()
    {
        return $this->result;
    }
}
?>
