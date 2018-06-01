<?php
    require("XML/RPC/Server.php");

    function hello ($args)
    {
		$vals = $args->getValues();
        return new XML_RPC_Response(new XML_RPC_Value("Hi {$vals[0]}!", 'string'));
    }

	function add ($args) {
		$vals = $args->getValues();
		return new XML_RPC_Response(new XML_RPC_Value($vals[0] + $vals[1], 'double'));
	}


    $methods = array(
		'hello' => array (
			'function'  => 'hello',
			'signature' => array(array($GLOBALS['XML_RPC_String'], $GLOBALS['XML_RPC_String'])),
			'docstring' => 'Greets you.'
		),

		'add' => array (
			'function'  => 'add',
			'signature' => array(array($GLOBALS['XML_RPC_Double'], $GLOBALS['XML_RPC_Double'], $GLOBALS['XML_RPC_Double'])),
			'docstring' => 'Adds two numbers'
		)
	);
    $server = new XML_RPC_Server($methods);
?>
