<?php
	$sx = simplexml_load_file('example.xml');

	echo $sx->body['background'] . "\n";
	echo $sx->body->p[1] . "\n";
	echo strip_tags($sx->body->p[0]->asXML()) . "\n";
	echo strip_tags($sx->body->p[1]->asXML()) . "\n";

	$e = $sx->body->children();
	foreach ($e as $c) {
		echo $c."\n";
	}
	
	echo $sx->head->title. "\n";

	foreach ($sx->attributes() as $attribute) {
		echo $attribute."\n";
	}

	foreach ($sx->attributes('xml') as $attribute) {
		echo $attribute."\n";
	}
?>
