<?php
	echo mb_internal_encoding(). "\n";
	if (@mb_internal_encoding('UTF-8')) {
		echo mb_internal_encoding(). "\n";
	}
	if (@mb_internal_encoding('ISO-8859-17')) {
		echo mb_internal_encoding(). "\n";
	}
	echo mb_internal_encoding(). "\n";
?>
