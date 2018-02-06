<?php
	/* Start date for the loop is October 29th, 2004 */
	$ts = mktime(12, 0, 0, 10, 29, 2004);

	/* We loop for 4 days */
	for ($i = 0; $i < 4; $i++) {
		echo date ("Y-m-d (H:i:s)\n", $ts);
		$ts += (24 * 60 * 60);
	}
?>
