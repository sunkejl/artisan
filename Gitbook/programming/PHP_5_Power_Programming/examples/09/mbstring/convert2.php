<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$from = 'ISO-8859-1';
	$to =   'ISO-8859-2';
	$string = "Denna text är på svenska.";
	echo "$from: $string\n\n";

	echo "$to: ". mb_convert_encoding($string, $to, $from). "\n\n";
	echo "$to: ". iconv($from, $to, $string). "\n\n";
	echo "$to: ". iconv($from, "$to//TRANSLIT", $string). "\n\n";
?>
