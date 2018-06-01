<?php
	$dom = new DomDocument();
	$dom->load('test2.xml');
	$xpath = new DomXPath($dom);
	$nodes = $xpath->query("*[local-name()='body']", $dom->documentElement);
	echo $nodes->item(0)->getAttributeNode('background')->value. "\n";
?>
