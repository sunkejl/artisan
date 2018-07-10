<?php
	/* We loop for 6 days */
	for ($i = 0; $i < 6; $i++) {
		$ts = mktime(0, 0, 0, 10, 30 + $i, 2004);
		echo date ("Y-m-d (H:i:s) T\n", $ts);
	}
?>
