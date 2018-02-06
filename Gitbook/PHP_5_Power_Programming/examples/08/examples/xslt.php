<?php
$dom = new domDocument();
$dom->load("php.net.xsl");
$proc = new xsltprocessor;
$xsl = $proc->importStylesheet($dom);

$xml = new domDocument();
$xml->load('php.net-stripped.rss');

//$dom = $proc->transformToDoc($xml);
$string = $proc->transformToXml($xml);
$proc->transformToUri($xml, '/tmp/foo');
echo $string;
?>
