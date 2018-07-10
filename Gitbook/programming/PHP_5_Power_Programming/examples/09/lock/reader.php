<?php /* reader */
	while (true) {
		$fp = fopen('testfile', 'r');
		echo "Waiting for lock...";
		flock($fp, LOCK_SH);
		echo "OK\n";

		echo fgets($fp, 2048);

		echo "Releasing lock...";
		flock($fp, LOCK_UN);
		echo "OK\n";

		fclose($fp);
		sleep(1);
	}
?>
