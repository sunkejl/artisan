<?php
	/* Setting the standard "C" locale */
	setlocale(LC_COLLATE, 'C');
	echo strcoll('�tte', '�re'), "\n";

	/* Setting the "Norwegian" locale */
	setlocale(LC_COLLATE, 'no_NO');
	echo strcoll('�tte', '�re'), "\n";
?>
