<?php
	$dom = new DomDocument();
	$dom->load('test2.xml');
	$body = $dom->documentElement->getElementsByTagName('body')->item(0);
	echo $body->getAttributeNode('background')->value. "\n";
?>
