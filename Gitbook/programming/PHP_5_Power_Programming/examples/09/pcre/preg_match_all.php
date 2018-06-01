<?php
$raw_document = file_get_contents('http://www.w3.org/TR/CSS21/');
$doc = html_entity_decode($raw_document);
$count = preg_match_all('/<(?P<email>([a-z.]+).?@[a-z0-9]+\.[a-z]{1,6})>/', $doc, $matches);
print_r($matches);
?>
