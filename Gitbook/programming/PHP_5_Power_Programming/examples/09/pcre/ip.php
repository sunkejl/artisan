<?php
	$str = "My IP address is 212.187.38.47.";
	preg_match('/(\d{1,3}\.){3}\d{1,3}/', $str, $matches);
	print_r($matches);
?>
