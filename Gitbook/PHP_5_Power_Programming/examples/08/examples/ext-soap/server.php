<?php
	class ExampleService {

		function hello ($name) {
			if (strlen($name)) {
				return "Hi {$name}!";
			} else {
				throw new SoapFault("Server", "No name :(.");
			}
		}
	}

$server = new SoapServer("example.wsdl");
$server->setClass("ExampleService");
$server->handle();
?> 
