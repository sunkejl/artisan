<?php
	if (isset ($_COOKIE['uid']) && $_COOKIE['uid']) {
?>
<html>
<head><title>Index page</title>
<body>
	Logged in with UID: <?php echo $_COOKIE['uid']; ?>
</body>
</html>
<?php
	} else {
		/* If no UID is in the cookie, we redirect to the login page */
		header('Location: http://kossu/crap/0x-examples/login.php');
	}
?>
