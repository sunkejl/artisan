<?php
	ob_start("ob_iconv_handler");
	iconv_set_encoding("internal_encoding", "ISO-8859-1");
	iconv_set_encoding("output_encoding", "UTF-8");

	$text = <<<END
PHP, est un acronyme récursif, qui signifie "PHP: Hypertext Preprocessor" :
c'est un langage de script HTML, exécuté coté serveur. L'essentiel de sa
syntaxe est emprunté aux langages C, Java et Perl, avec des améliorations
spécifiques. L'objet de ce langage est de permettre aux développeurs web
d'écrire des pages dynamiques rapidement.

END;

	echo $text;
?>
