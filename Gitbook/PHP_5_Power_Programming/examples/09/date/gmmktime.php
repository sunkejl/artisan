<?php
	/* gmmktime with a date outside the DST range */
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 2, 17, 2004)). "\n";
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 2, 17, 2004, 0)). "\n";
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 2, 17, 2004, 1)). "\n\n";

	/* gmmktime with a date inside the DST range */
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 6, 17, 2004)). "\n";
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 6, 17, 2004, 0)). "\n";
	echo date("Ymd H:i:s", gmmktime(15, 16, 17, 6, 17, 2004, 1)). "\n\n";
?>