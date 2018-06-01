<?php
	include 'session.inc';

	$page = preg_replace('@[^a-z]@', '', $_GET['page']);

	if (!$page ||
		!in_array($page, array ('login', 'register', 'index', 'logout')))
	{
		$page = 'login';
	}
