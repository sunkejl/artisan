<?php
	echo "System time:\n";
	echo strftime("%c\n");

	echo "\nEST in en_US:\n";
	setlocale(LC_ALL, "en_US");
	putenv("TZ=EST");
	echo strftime("%c\n");

	echo "\nMET in nl_NL:\n";
	setlocale(LC_ALL, "nl_NL");
	putenv("TZ=MET");
	echo strftime("%c\n");

	echo "\nMET in no_NO:\n";
	setlocale(LC_ALL, "no_NO");
	putenv("TZ=MET");
	echo strftime("%c\n");

	echo "\nIST in iw_IL:\n";
	setlocale(LC_ALL, "iw_IL");
	putenv("TZ=IST");
	echo strftime("%c\n");
?>
