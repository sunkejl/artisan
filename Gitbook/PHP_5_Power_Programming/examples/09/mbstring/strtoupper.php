<?php
	/* Setting the standard "C" locale */
	setlocale(LC_CTYPE, 'C');
	echo strtoupper('�tte'), "\n";

	/* Setting the "Norwegian" locale */
	setlocale(LC_CTYPE, 'no_NO');
	echo strtoupper('�tte'), "\n";
?>
