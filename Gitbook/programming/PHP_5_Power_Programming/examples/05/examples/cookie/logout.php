<?php
	setcookie('uid', '', time() - 86400, '/');
	header('Location: http://kossu/crap/0x-examples/login.php');
?>
