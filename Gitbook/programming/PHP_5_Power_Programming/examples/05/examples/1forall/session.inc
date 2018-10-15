<?php
	function check_login() {
		if (!isset ($_SESSION['uid']) || !$_SESSION['uid']) {
			/* If no UID is in the cookie, we redirect to the login page */
			header('Location: http://kossu/crap/0x-examples/1forall/login.php');
		}
	}

	ini_set('session.use_cookies', 1);
	ini_set('session.use_only_cookies', 1);
	session_start();
?>
