<?php
	$names = array('rethans, derick', 's�ther bakken, stig', 'gutmans, andi');
	$names = preg_replace('@([^,]+).\ (.*)@', '\\2 \\1', $names);
	print_r($names);
?>
