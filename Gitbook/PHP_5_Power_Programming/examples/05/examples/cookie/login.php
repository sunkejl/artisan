<?php
	function check_auth() { return 4; }
?>
<html>
<head><title>Login</title></head>
<body>
<?php
	if (isset ($_POST['login']) && ($_POST['login'] == 'Log in') &&
		($uid = check_auth($_POST['email'], $_POST['password'])))
	{
		/* User succesfully logged in, setting cookie */
		setcookie('uid', $uid, time() + 14400, '/');
		header('Location: http://kossu/crap/0x-examples/index.php');
	} else {
?>
	<h1>Log-in</h1>
	<form method="post" action="login.php">
		<table>
		<tr><td>E-mail address:</td><td><input type='text' name='email'/></td></tr>
		<tr><td>Password:</td><td><input style='border-style: none none solid none; border-color: black; border-width: 1px;' type='password' name='password'/></td></tr>
		<tr><td colspan='2'><input type='submit' name='login' value='Log in'/></td></tr>
		</table>
	</form>
<?php
	}
?>
</body>
</html>

