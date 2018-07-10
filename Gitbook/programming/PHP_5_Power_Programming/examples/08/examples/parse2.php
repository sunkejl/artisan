<?php
	$dom = new DomDocument();
	$dom->load('test2.xml');
	$root = $dom->documentElement;

	process_children($root);

	function process_children($node)
	{
		$children = $node->childNodes;

		foreach ($children as $elem) {
			if ($elem->nodeType == XML_TEXT_NODE) {
				if (strlen(trim($elem->nodeValue))) {
					echo trim($elem->nodeValue)."\n";
				}
			} else if ($elem->nodeType == XML_ELEMENT_NODE) {
				process_children($elem);
			}
		}
	}
?>
