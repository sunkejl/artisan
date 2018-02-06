<?php
	$str1 = "Hvor går på kino? ©";
	$str2 = "Hvor gÃ¥r pÃ¥ kino? ©";

	echo mb_detect_encoding($str1, 'utf-8, iso-8859-1') . "\n";
	echo mb_detect_encoding($str2, 'utf-8, iso-8859-1') . "\n";
?>
