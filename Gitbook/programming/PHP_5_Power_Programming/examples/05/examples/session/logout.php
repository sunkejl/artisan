<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header('Location: http://kossu/crap/0x-examples/session/login.php');
?>
