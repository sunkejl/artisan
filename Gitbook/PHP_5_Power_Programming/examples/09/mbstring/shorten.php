<?php
	header("Content-type: text/html; encoding: UTF-8");
	iconv_set_encoding('internal_encoding', 'utf-8');
	$text = "Ceci est un texte en français, il n'a pas de sense si ce n'est
	celui de vous montrez comment nous pouvons utiliser ces fonctions afin de
	réduire ce texte à une taille acceptable.";

	echo "<p>$text</p>\n";
	
	echo '<p>'. substr($text, 0, 26). "...</p>\n";
	echo '<p>'. iconv_substr($text, 0, 26). "...</p>\n";
?>
