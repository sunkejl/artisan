<?php
/**
* @author Derick Rethans <derick@php.net>
* @package PHPDocExample
* @subpackage PHPDocExampleFunctions
*/

/**
* File with utility functions
*/
require_once 'utility.php';

/**
* The error class
* This error class is thrown when an error in one of the
* other Sum* classes occurs
* @author Derick Rethans <derick@php.net>
* @author Stig Bakken <ssb@fast.no>
* @copyright © 2002 by Derick Rethans
* @version $Id: $
* @package PHPDocExample
*/
class SumError {
    /**
    * The constructor for the error class
    * @param string $msg Error message
    */
    function SumError ($msg)
    {
        echo $msg. "\n";
    }
}
?>
