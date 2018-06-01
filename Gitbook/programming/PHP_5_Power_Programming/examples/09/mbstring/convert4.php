<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$from = 'ISO-8859-1'; // Latin 1: West European
	$to =   'html'; // Pseudo encoding
	$string = "Esto texto es Español.";
	echo "$from: $string\n\n";

	echo "$to: ". mb_convert_encoding($string, $to, $from). "\n\n";
?>
