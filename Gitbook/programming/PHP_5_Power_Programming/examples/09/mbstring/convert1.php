<?php
	$string = "Kan De være så vennlig å hjelpe meg?\n\n";
	$string = "Detta är på svenska\n\n";
	echo "ISO-8859-1: $string";

	echo 'UTF-8: '. mb_convert_encoding($string, 'UTF-8', 'ISO-8859-1');
	echo 'UTF-8: '. iconv('ISO-8859-1', 'UTF-8', $string);
?>
