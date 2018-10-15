<?php
	require_once 'SOAP/Server.php';

	class Example {
		function hello ($arg)
		{
			return "Hi {$arg}!";
		}

		function add ($a, $b) {
			return new SOAP_Value('ret', 'float', $a + $b);
		}
	}

	$server = new SOAP_Server;
	$soapclass = new Example();
	$server->addObjectMap($soapclass,'urn:Example');
	$server->service($HTTP_RAW_POST_DATA);
?>
