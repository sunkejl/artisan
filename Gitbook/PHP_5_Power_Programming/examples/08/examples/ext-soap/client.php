<?php
	$s = new SoapClient('example.wsdl');

	try {
		echo $s->hello('Derick'), "\n";
		echo $s->hello(), "\n";
	} catch (SoapFault $e) {
		echo $e->faultcode, ' ', $e->faultstring, "\n";
	}
?>
