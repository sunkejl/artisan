<html>
<head><title>Register</title></head>
<body>
<?php
	if (!isset ($_POST['register']) ||($_POST['submit'] != 'Register')) {
?>
	<h1>Registration</h1>
	<form method="post" action="register.php">
		<table>
		<tr><td>E-mail address:</td><td><input type='text' name='email'/></td></tr>
		<tr><td>First name:</td><td><input type='text' name='first_name'/></td></tr>
		<tr><td>Last name:</td><td><input type='text' name='last_name'/></td></tr>
		<tr><td>Password:</td><td><input type='password' name='password'/></td></tr>
		<tr><td colspan='2'><input type='submit' name='register' value='Register'/></td></tr>
		</table>
	</form>
<?php
	} else {
?>
E-mail: <?php echo $_POST['email']; ?><br />
Name: <?php echo $_POST['first_name'] . $_POST['last_name']; ?><br />
Password: <?php echo $_POST['password']; ?><br />
<?php
	}
?>
</body>
</html>

