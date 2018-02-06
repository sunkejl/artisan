#!/usr/local/bin/php
<?php
	/* Include the class */
	require_once 'SOAP/Client.php';

	/* Create the client object */
	$endpoint = 'http://kossu/fasttrack/chapter_14/soap/server.php';
	$client = new SOAP_Client($endpoint);

	/* Make the call */
	$response = $client->call(
		'hello',
		array('arg' => 'Derick'), 
		array('namespace' => 'urn:Example')
	);
	var_dump($response);

	/* Make the call */
	$a = new SOAP_Value('a', 'int', 212.3);
	$b = new SOAP_Value('b', 'int', 312.3);
	$response = $client->call(
		'add',
		array($a, $b),
		array('namespace' => 'urn:Example')
	);
	var_dump($response);
?>
