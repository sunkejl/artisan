<?php
	$str = 'This is an example for preg_split().';
	$words = preg_split('@[\W]+@', $str, 2);
	print_r($words);
?>
