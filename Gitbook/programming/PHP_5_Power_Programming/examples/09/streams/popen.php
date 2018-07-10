<?php
	$fp = popen('ls -l /', 'r');
	while (!feof($fp)) {
		echo fgets($fp);
	}
?>
