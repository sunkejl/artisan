<?php
	/* Setting the standard "C" locale */
	setlocale(LC_CTYPE, 'C');
	echo strtoupper('åtte'), "\n";

	/* Setting the "Norwegian" locale */
	setlocale(LC_CTYPE, 'no_NO');
	echo strtoupper('åtte'), "\n";
?>
