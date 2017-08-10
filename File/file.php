<?php
//r read | r+ read write
//w write; truncates file;not exist create;places the file pointer at the beginning of the file. | w+  write read
//a write;not exist create;places the file pointer at the end  of the file.
var_dump(__FILE__);
var_dump(basename(__FILE__));
var_dump(dirname(__FILE__));
var_dump(filegroup(__FILE__));
chmod(__FILE__, 0777);
chown(__FILE__, "sk");
chgrp(__FILE__, "sk");
$path = "foo.md";
$filePoint = fopen($path, "a");
fwrite($filePoint, ",world");
fclose($filePoint);
$filePoint = fopen($path, "r");
$r = fread($filePoint, filesize($path));
fclose($filePoint);
var_dump($r);
