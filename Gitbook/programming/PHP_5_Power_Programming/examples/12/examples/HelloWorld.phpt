--TEST--
HelloWorld test
--FILE--
<?php
include dirname(__FILE__).'/../HelloWorld.php';
new HelloWorld(false);
new HelloWorld(true);
?>
--EXPECT--
Hello, World! 
Hello, World!<br />
