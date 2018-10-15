<?php
	setlocale(LC_TIME, 'en_US');
	echo strftime('%c'), "\n";

	setlocale(LC_TIME, 'nl_NL');
	echo strftime('%c'), "\n";

	setlocale(LC_TIME, 'no_NO');
	echo strftime('%c'), "\n";
?>
