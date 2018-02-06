<?php
	$str = 'This is an example.';
	$words = preg_split('@([\W]+)@', $str, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_DELIM_CAPTURE);
	var_export($words);
?>
