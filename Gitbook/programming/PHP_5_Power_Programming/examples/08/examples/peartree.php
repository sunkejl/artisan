<?php
	require_once 'XML/Tree.php';

	/* Create the document and the root node */
	$dom = new XML_Tree;
	$html =& $dom->addRoot('html', '',
		array (
			'xmlns' => 'http://www.w3.org/1999/xhtml',
			'xml:lang' => 'en',
			'lang' => 'en'
		)
	);

	/* Create head and title elements */
	$head =& $html->addChild('head');
	$title =& $head->addChild('title', 'XML Example');

	/* Create the body and p elements */
	$body =& $html->addChild('body', '', array ('background' => 'bg.png'));
	$p =& $body->addChild('p');

	/* Add the "Moved to" */
	$p->addChild(NULL, "Moved to ");

	/* Add the a */
	$p->addChild('a', 'example.org', array ('href' => 'http://example.org'));

	/* Add the ".", br and "foo & bar" */
	$p->addChild(NULL, ".");
	$p->addChild('br');
	$p->addChild(NULL, "foo & bar");

	/* Dump the reprensentation */
	$dom->dump();
?>
