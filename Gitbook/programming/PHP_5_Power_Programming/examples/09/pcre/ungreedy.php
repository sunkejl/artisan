<?php
$str = '<a href="http://php.net/">PHP</a> has an '.
'<a href="http://php.net/manual">excellent</a> manual.';
$pattern = '@<a.*>(.*)</a>@U';
preg_match($pattern, $str, $matches);
print_r($matches);
?>
