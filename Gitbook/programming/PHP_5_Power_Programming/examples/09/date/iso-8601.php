<?php
	for ($i = 27; $i <= 31; $i++) {
		echo gmstrftime("%Y-%m-%d (%V %G, %A)\n", gmmktime(0, 0, 0, 12, $i, 2004));
	}
	for ($i = 1; $i <= 6; $i++) {
		echo gmstrftime("%Y-%m-%d (%V %G, %A)\n", gmmktime(0, 0, 0, 1, $i, 2005));
	}
?>
