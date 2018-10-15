<?php
	include 'session.inc';

	check_login();
?>
<html>
<head><title>Index page</title>
<body>
	Logged in with UID: <?php echo $_SESSION['uid']; ?>
</body>
</html>
