<?php
	/* Setting the standard "C" locale */
	putenv('LC_MESSAGES=C');
	echo exec('cat nothere'), "\n";

	/* Setting the "Norwegian" locale */
	putenv('LC_MESSAGES=no_NO');
	echo exec('cat nothere'), "\n";
?>
