<?php
/**
* @package Examples
* @author Derick Rethans <derick@php.net>
*/

/**
* Return rows
*
* Run a query on the database connection and return the specified number
* of rows if specified
* @private
* @param resource $conn  The database connection resource
* @param string   $query The query
* @param int      $limit Limit to this number of returned rows
* @return array
*/
function _runQuery ($conn, $query, $limit = 0)
{
   $ret = array();
    mysql_query ($conn, $query . ($limit ? " LIMIT $limit" : ""));
    while ($row = $mysql_fetch_row) {
        $ret[] = $row;
    }
    return $ret;
}
?>
