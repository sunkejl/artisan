<?php
	function format_string($matches)
	{
		return ucwords("{$matches[2]} {$matches[1]}");
	}
	
	$names = array('rethans, derick', 'sæther bakken, stig', 'gutmans, andi');
	$names = preg_replace_callback('@([^,]+).\ (.*)@', 'format_string', $names);
	print_r($names);
?>
