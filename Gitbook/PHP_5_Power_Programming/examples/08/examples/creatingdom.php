<?php
	$dom = new DomDocument();

	$html = $dom->createElement('html');
	$html->setAttribute("xmlns", "http://www.w3.org/1999/xhtml");
	$html->setAttribute("xml:lang", "en");
	$html->setAttribute("lang", "en");
	$dom->appendChild($html);

/* First a DomDocument class is created with domxml_new_doc(). The parameter
 * denotes the XML version that is used for this document, this is always
 * "1.0". All elements are created by calling the createElement() method of
 * the DomDocument class. The parameter to this method call is the name of the
 * element, in this case 'html' and the return value is an object of the type
 * DomElement which you can use to add attributes to the element. After the
 * DomElement has been totally prepared we add it do the DomDocument by calling
 * the appendChild() method. We continue by adding the head to the html
 * element and a title element to the head element: */

	$head = $dom->createElement('head');
	$html->appendChild($head);

	$title = $dom->createElement('title');
	$title->appendChild($dom->createTextNode("XML Example"));
	$head->appendChild($title);

/* Again we first create a DomElement object by calling the createElement()
 * method of the DomDocument object and we add it to the DomElement object
 * $html with appendChild(). Next we add the body element with the "background"
 * attribute and as child of the body element the p element which will contain
 * the main content of our X(HT)ML document: */

	/* Create the body element */
	$body = $dom->createElement('body');
	$body->setAttribute("backgound", "bg.png");
	$html->appendChild($body);

	/* Create the p element */
	$p = $dom->createElement('p');
	$body->appendChild($p);

/* The contents of our "p" element are a little bit more complicated, it
 * consists (in order) of  a text element ("Moving to "), an "a" element, again
 * a text element (our dot), the "br" element and finally another text element
 * ("foo & bar"): */

	/* Add the "Moved to" */
	$text = $dom->createTextNode("Moved to ");
	$p->appendChild($text);

	/* Add the a */
	$a = $dom->createElement('a');
	$a->setAttribute("href", "http://example.org/");
	$a->appendChild($dom->createTextNode("example.org"));
	$p->appendChild($a);

	/* Add the ".", br and "foo & bar" */
	$text = $dom->createTextNode(".");
	$p->appendChild($text);

	$br = $dom->createElement('br');
	$p->appendChild($br);

	$text = $dom->createTextNode("foo & bar");
	$p->appendChild($text);

/* When we're finally done creating our DOM of our X(HT)ML document we echo it
 * to the screen. */

	echo $dom->saveXml();
?>
