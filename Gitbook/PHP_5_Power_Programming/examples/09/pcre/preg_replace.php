<?php
$str = 'The language [link url="http://www.php.net"]PHP[/link] is cool.';
$pattern = '@\[link\ url="([^"]+)"\](.*?)\[/link\]@';
$replacement = '<a href="\\1">${2}</a>';
$str = preg_replace($pattern, $replacement, $str);
echo $str;
?>
