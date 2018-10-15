<?php
	$str = 'This is an example.';
	$words = preg_split('@([\W]+)@', $str, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
	print_r($words);
?>
