<?php
	$names = array('rethans, derick', 'sæther bakken, stig', 'gutmans, andi');
	$names = preg_replace('@([^,]+).\ (.*)@e', 'ucwords("\\2 \\1")', $names);
	print_r($names);
?>
