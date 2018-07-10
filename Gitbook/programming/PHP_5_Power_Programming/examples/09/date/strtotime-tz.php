<?php
	echo date("H:i:s T\n", strtotime("09:22"));
	echo date("H:i:s T\n\n", strtotime("09:22 GMT"));

	echo gmdate("H:i:s T\n", strtotime("09:22"));
	echo gmdate("H:i:s T\n", strtotime("09:22 GMT"));
?>
