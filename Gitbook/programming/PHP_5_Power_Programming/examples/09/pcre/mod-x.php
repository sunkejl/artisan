<?php
	$str = "ABC\nDEF\nGHI";
	preg_match('@A B C@', $str, $matches1);
	preg_match('@A B C@x', $str, $matches2);
	print_r($matches1);
	print_r($matches2);
?>
