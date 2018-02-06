<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$from = 'ISO-8859-1'; // Latin 1: West European
	$to =   'ISO-8859-4'; // Latin 4: Scandinavian/Baltic
	$string = "Ce texte est en français.";
	echo "$from: $string\n\n";

	// Default
	echo "$to: ". mb_convert_encoding($string, $to, $from). "\n\n";

	// no output for offending characters:
	mb_substitute_character('none');
	echo "$to: ". mb_convert_encoding($string, $to, $from). "\n\n";

	// Unicode value output for offending characters:
	mb_substitute_character('long');
	echo "$to: ". mb_convert_encoding($string, $to, $from). "\n\n";
?>
