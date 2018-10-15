<?php /* writer */
	while (true) {
		$fp = fopen('testfile', 'w');
		echo "Waiting for lock...";
		flock($fp, LOCK_EX);
		echo "OK\n";

		$date =  date("Y-m-d H:i:s\n");
		echo $date;
		fputs($fp, $date);
		sleep(1);

		echo "Releasing lock...";
		flock($fp, LOCK_UN);
		echo "OK\n";

		fclose($fp);
		usleep(1);
	}
?>
