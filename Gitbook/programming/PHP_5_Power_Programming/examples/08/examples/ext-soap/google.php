#!/usr/local/bin/php
<?php
	/* Read the search string from the command line */
	if ($argc != 2) {
		echo "usage: ./google.php searchstring\n\n";
		exit();
	}
	$query = $argv[1];

	/* Defining the 'licence' key */
	$key = 'b/Wq+3hQFHILurTSX6USaub3VeRGsdSg';

	/* Defining maximum number of results and starting index */
	$maxResults = 3; $start = 0;

	/* Setup the other parameters */
	$filter = FALSE; $restrict = ''; $safeSearch = FALSE;
	$lr = ''; $ie = ''; $oe = '';

	/* Make the call */
	$client = new SoapClient('GoogleSearch.wsdl');
	$res = $client->doGoogleSearch($key, $query, $start, $maxResults, $filter, $restrict, $safeSearch, $lr, $ie, $oe);

	/* Display results */
	foreach ($res->resultElements as $result) {
	    echo html_entity_decode(strip_tags("{$result->title}\n({$result->URL})\n\n"));
	    echo wordwrap(html_entity_decode(strip_tags($result->snippet)));
		echo "\n\n----------------------------\n\n";
	}
?>
