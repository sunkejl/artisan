<?php
	$f = fopen("testfile", "w");
	unlink("testfile");
	sleep(60);
	fclose($f);
?>
