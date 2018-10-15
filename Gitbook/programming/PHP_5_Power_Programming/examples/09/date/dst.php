<?php
	/* Start date for the loop is October 30th, 2004 */
	$ts = mktime(0, 0, 0, 10, 30, 2004);

	/* We loop for 6 days */
	for ($i = 0; $i < 6; $i++) {
		echo date ("Y-m-d (H:i:s)\n", $ts);
		$ts += (24 * 60 * 60);
	}
?>
