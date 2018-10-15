<?php
	preg_match(
		'/(?P<century>[12][0-9])(?P<year>[0-9]{2})/',
		'PHP in 2005.',
		$matches
	);
	var_dump($matches);
?>
