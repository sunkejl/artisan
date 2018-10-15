<?php

require_once 'Auth.php';

$auth = new Auth("File", ".htpasswd", "login_function");
$auth->start();
if (!$auth->getAuth()) {
    exit;
}

if (!empty($_REQUEST['logout'])) {
    $auth->logout();
    print "<h1>Logged out</h1>\n";
    print "<a href=\"$_SERVER[PHP_SELF]\">Log in again</a>\n";
    exit;
}

print "<h1>Logged in!</h1>\n";

if (!empty($_REQUEST['dump'])) {
    print "<pre>SESSION=";
    var_dump($_SESSION);
    print "</pre>\n";
} else {
    print "<a href=\"$_SERVER[PHP_SELF]?dump=1\">Dump session</a><br>\n";
}

print "<a href=\"$_SERVER[PHP_SELF]?logout=1\">Log Out</a>\n";

// --- execution ends here ---

function login_function($username, $status, $auth_obj)
{ 
    ?>
    <h1>Please Log In</h1>
    <form name="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      User name: <input name="username" value="<?php echo $username?>">
      Password: <input name="password">
      <input type="submit" value="Log In">
    </form>
    <script language="javascript">document.login.username.focus();</script>
<?php
}
