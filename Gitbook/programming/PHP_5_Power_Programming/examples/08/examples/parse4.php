<?php
	/* Create the document and the root node */
	$dom = domxml_new_doc('1.0');

	$html = $dom->create_element('html');
	$html->set_attribute("xmlns", "http://www.w3.org/1999/xhtml");
	$html->set_attribute("xml:lang", "en");
	$html->set_attribute("lang", "en");
	$dom->append_child($html);

	/* Create head element */
	$head = $dom->create_element('head');
	$html->append_child($head);

	/* Create title element with content */
	$title = $dom->create_element('title');
	$text = $dom->create_text_node('XML Example');
	$title->append_child($text);
//	$title->set_content("XML Example");
	$head->append_child($title);


	/* Create the body element */
	$body = $dom->create_element('body');
	$body->set_attribute("backgound", "bg.png");
	$html->append_child($body);

	/* Create the p element */
	$p = $dom->create_element('p');
	$body->append_child($p);

	/* Add the "Moved to" */
	$text = $dom->create_text_node("Moved to ");
	$p->append_child($text);

	/* Add the a */
	$a = $dom->create_element('a');
	$a->set_attribute("href", "http://example.org/");
	$a->set_content("example.org");
	$p->append_child($a);

	/* Add the ".", br and "foo & bar" */
	$text = $dom->create_text_node(".");
	$p->append_child($text);

	$br = $dom->create_element('br');
	$p->append_child($br);

	$text = $dom->create_text_node("foo & bar");
	$p->append_child($text);

	/* Dump the reprensentation */
	echo $dom->dump_mem(TRUE);
