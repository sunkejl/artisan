<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Example class to show the use of the access tag
* @package Examples
*/
class Example {

    /**
    * @var    float $_amount   Amount of money in my pocket
    * @access private
    */
    var $_amount;

    /**
    * Subtracts money from my pocket and gives it away
    *
    * @param  float $money   Amount of money to give away
    * @access private
    */
    function _giveMoneyAway ($money) {
        $ret = $this->_amount;
        $this->_amount -= $money;
        return $ret;
    }

    /**
    * Calculate the amount of money and give it away
    *
    * @param  int $bills   Number of ?10 bills to give away
    * @access public
    */
    function giveBillsAway ($bills) {
        return $this->_giveMoneyAway($bills * 10);
    }
} 
?>
