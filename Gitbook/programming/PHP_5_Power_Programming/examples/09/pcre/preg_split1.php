<?php
	$str = 'This is an example for preg_split().';
	$words = preg_split('@[\W]+@', $str);
	print_r($words);
?>
