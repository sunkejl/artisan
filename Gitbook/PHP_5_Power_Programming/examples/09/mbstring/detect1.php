<?php
	$str1 = "Hvor g�r p� kino? �";
	$str2 = "Hvor går på kino? �";

	echo mb_detect_encoding($str1, 'utf-8, iso-8859-1') . "\n";
	echo mb_detect_encoding($str2, 'utf-8, iso-8859-1') . "\n";
?>
