<?php
	$string = "##Testing123##";
	preg_match('@\b.+\b@', $string, $matches);
	print_r($matches);
?>
