<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Top level class
* @package Examples
* @abstract
*/
class top {
}

/**
* Middle layer class
* @package Examples
*/
class middle extends top {
}

/**
* Bottom layer class
* @package Examples
* @final
*/
class bottom extends middle {
}
?>
