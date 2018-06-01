#!/usr/local/bin/php
<?php
	/* Include the class */
	require_once 'SOAP/Client.php';

	/* Create the client object */
	$endpoint = 'http://api.google.com/search/beta2';
	$client = new SOAP_Client($endpoint);

	/* Defining the 'licence' key */
	$key = 'jx+PnvxQFHIrV1A2rnckQn8t91Pp/6Zg';

	/* Defining maximum number of results and starting index */
	$maxResults = 3;
	$start = 0;

	/* Setup the other parameters */
	$filter = FALSE;
	$restrict = '';
	$safeSearch = FALSE;
	$lr = '';
	$ie = '';
	$oe = '';

	/* Read the search string from the command line */
	if ($argc != 2) {
		echo "usage: ./google.php searchstring\n\n";
		exit();
	}
	$query = $argv[1];

	/* Make the call */
	$params = array(
		'key'        => $key,
		'q'          => $query,
		'start'      => $start,
		'maxResults' => $maxResults,
		'filter'     => $filter,
		'restrict'   => $restrict,
		'safeSearch' => $safeSearch,
		'lr'         => $lr,
		'ie'         => $ie,
		'oe'         => $oe
	);
	$response = $client->call(
		'doGoogleSearch',
		$params,
		array('namespace' => 'urn:GoogleSearch')
	);

	/* Display results */
	foreach ($response->resultElements as $result) {
	    echo html_entity_decode(strip_tags("{$result->title}\n({$result->URL})\n\n"));
	    echo wordwrap(html_entity_decode(strip_tags($result->snippet)));
		echo "\n\n----------------------------\n\n";
	}
?>
