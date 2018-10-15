<?php
	/* Turn error reporting off */
	error_reporting(0);

	class bagel {
	}

	$b = new bagel();

	/* Cast to an integer */
	if ((int) $b) {
		echo "Groovy baby!\n";
	}

	/* Turn on compatibility mode and cast to an integer */
	ini_set('zend.ze1_compatibility_mode', 1);
	if ((int) $b) {
		echo "Yeah baby!\n";
	}
?>
