<?php
	$names = array('rethans, derick', 's�ther bakken, stig', 'gutmans, andi');
	$names = preg_replace('@([^,]+).\ (.*)@e', 'ucwords("\\2 \\1")', $names);
	print_r($names);
?>
