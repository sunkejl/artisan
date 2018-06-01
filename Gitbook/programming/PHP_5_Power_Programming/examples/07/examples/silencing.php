<?php

if (@$_GET['id']) {
	$obj = new MyDataObject;
	$name = $obj->get('id', $_GET['id']);
	print "The name you are looking for is $name!<br />\n";
}

?>
