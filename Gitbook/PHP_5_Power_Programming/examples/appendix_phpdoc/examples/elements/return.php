<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* @param  string    $filename   The filename of the image
* @return resource              A GD image resource
*/
function returnNiceGif ($filename)
{
    return imagecreatefromgif ($filename);
}
?>
