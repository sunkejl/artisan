<?php
	$dom = new DomDocument();
	$dom->load('test2.xml');
	$root = $dom->documentElement;

	process_children($root);

	function process_children($node)
	{
		$children = $node->childNodes;

		foreach ($children as $elem) {
			if ($elem->nodeType == XML_ELEMENT_NODE) {
				if ($elem->nodeName == 'body') {
					echo $elem->getAttributeNode('background')->value. "\n";
				}
				process_children($elem);
			}
		}
	}
?>
