<?php
	require("XML/RPC.php");

	$client = new XML_RPC_Client('/fasttrack/chapter_14/xmlrpc_example.php', 'localhost');

	function call_method ($client, $msg) {
		$p = $client->send($msg);
		if (PEAR::isError($p)) {
			echo $p->getMessage();
		} else {
			if ($p->faultCode()) {
				echo $p->faultString();
				return NULL;
			} else {
				$res = $p->value();
				return $res;
			}
		}
	}

	/* Simple example with implicit type */
	$vals = array (
		new XML_RPC_Value('Derick', 'string')
	);
	$msg = new XML_RPC_Message('hello', $vals);
	$res = call_method(&$client, &$msg);
	echo XML_RPC_decode($res)."\n";


	/* Somewhat more example with explicit types and multiple
	 * parameters */
	$vals = array (
		9 => XML_RPC_encode(97.0),
		7 => XML_RPC_encode(80.9),
	);
	$msg = new XML_RPC_Message('add', $vals);
	$res = call_method(&$client, &$msg);
	echo XML_RPC_decode($res)."\n";


	/* Complex example which shows retrospection */
	$msg = new XML_RPC_Message('system.listMethods');
	$res = call_method(&$client, &$msg);

	foreach (XML_RPC_decode($res) as $item) {

		$vals = array (XML_RPC_encode($item));
		$msg = new XML_RPC_Message('system.methodHelp', $vals);
		$desc = XML_RPC_decode(call_method(&$client, &$msg));

		$msg = new XML_RPC_Message('system.methodSignature', $vals);
		$sigs = XML_RPC_decode(call_method(&$client, &$msg));
		$siginfo = '';
		foreach ($sigs[0] as $sig) {
			$siginfo .= $sig. " ";
		}

		echo "$item\n". wordwrap($desc). "\n\t$siginfo\n\n";
	}

?>
