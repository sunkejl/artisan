<?php
	$subject = "Montréal";
	echo setlocale(LC_ALL, 'C'); /* The 'default' locale */
	preg_match('/^\w+/', $subject, $matches);
	print_r($matches);
	echo setlocale(LC_ALL, 'nl_NL');
	preg_match('/^\w+/', $subject, $matches);
	print_r($matches);
?>
