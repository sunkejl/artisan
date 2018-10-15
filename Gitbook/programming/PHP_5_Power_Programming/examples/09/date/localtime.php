<?php

	print_r(localtime(time(), 1));

	setlocale(LC_ALL, 'nl_NL');
	print_r(getdate());
?>
