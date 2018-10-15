<?php
$text = "This is a nice text; with punctuation AND capitals";
$patterns = array('@[A-Z]@e', '@[\W]@', '@_+@');
$replacements = array('strtolower(\\0)', '_', '_');
$text = preg_replace($patterns, $replacements, $text);
echo $text."\n";
?>
