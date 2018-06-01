<?php
	$string = 'Derick Rethans <derick@php.net>';
	preg_match(
		"/([^<]+)<([a-zA-Z0-9_-]+@([a-zA-Z0-9_-]+\\.)+[a-zA-Z0-9_-]+)>/",
		$string,
		$matches
	);
	print_r($matches);
?>
