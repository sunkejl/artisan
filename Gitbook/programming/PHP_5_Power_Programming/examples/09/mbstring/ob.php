<?php
	ob_start("ob_iconv_handler");
	iconv_set_encoding("internal_encoding", "ISO-8859-1");
	iconv_set_encoding("output_encoding", "UTF-8");

	$text = <<<END
PHP, est un acronyme r�cursif, qui signifie "PHP: Hypertext Preprocessor" :
c'est un langage de script HTML, ex�cut� cot� serveur. L'essentiel de sa
syntaxe est emprunt� aux langages C, Java et Perl, avec des am�liorations
sp�cifiques. L'objet de ce langage est de permettre aux d�veloppeurs web
d'�crire des pages dynamiques rapidement.

END;

	echo $text;
?>
