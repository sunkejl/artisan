<?php
	$dom = domxml_xmltree(file_get_contents('test2.xml'));

	$root = $dom;

	process_children($dom);

	function process_children($element)
	{
		if (isset($element->children) && is_array($element->children)) {
			$children = $element->children;

			foreach ($children as $child) {
				switch (get_class($child)) {
					case 'domelement':
						process_children($child);
						break;
					case 'domtext':
						$text = trim($child->content);
						if (strlen($text)) {
							echo "$text\n";
						}
						break;
				}
			}
		}
	}
		
?>
