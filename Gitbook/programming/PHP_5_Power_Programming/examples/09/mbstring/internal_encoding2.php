<?php
iconv_set_encoding('internal_encoding', 'UTF-8');
iconv_set_encoding('output_encoding', 'ISO-8859-1');

echo iconv_get_encoding('internal_encoding'). "\n";
echo iconv_get_encoding('output_encoding'). "\n";
?> 
