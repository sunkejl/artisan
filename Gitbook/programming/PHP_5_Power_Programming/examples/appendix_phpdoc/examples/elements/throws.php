<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
 * tableInfo() is not implemented in the PEAR Cache DB module.
 * @param   mixed   $mode
 * @throws  object  Cache_Error
 */
function tableInfo($mode = null) {
    return new Cache_Error('tableInfo() is not implemented in the
                           PEAR Cache DB module.',
                           __FILE__,
                           __LINE__
                          );
}
?>
