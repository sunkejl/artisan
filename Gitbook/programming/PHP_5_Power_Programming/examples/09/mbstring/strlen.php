<?php
	$string = "Må jeg bytte tog?";
	$from   = 'iso-8859-1';
	$to     = 'utf-8';

	iconv_set_encoding('internal_encoding', $to);

	echo $string."\n";
	echo "strlen:       ". strlen($string). "\n";

	$string = iconv($from, $to, $string);

	echo $string."\n";
	echo "strlen:       ". strlen($string). "\n";
	echo "iconv_strlen: ". iconv_strlen($string). "\n";
?>
