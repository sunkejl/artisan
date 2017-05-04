<?php
//token_get_all 将提供的源码按 PHP 标记进行分割
$t = token_get_all("<?php \$a=123;echo \$a; ?>");
var_dump($t);