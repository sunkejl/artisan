<?php
/**
* Example included file with utility functions
* @author Derick Rethans <derick@php.net>
* @version $Id: $
* @package PHPDocExample
* @subpackage PHPDocExampleFunctions
*/

/** 
* Function to add numbers in arrays
*   
* This function returns an array in which every element is the sum of the
* two corresponding  elements in the input arrays.
* @since Version 0.9
* @param array $array1  The first input array
* @param array $array2   The second input array
* @return array
*/
function sumElements ($array1, $array2)
{   
    $ret = $array1;
    
    foreach ($array2 as $key => $element) {
        if (isset ($ret[$key])) {
            $ret[$key] += $element;
        } else {
            $ret[$key] = $element;
        }
    }
    return $ret;
}
?>
