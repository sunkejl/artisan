<?php
session_start();
$_SESSION['name'] = serialize(["name" => 1, "age" => 2, "country" => 3]);
var_dump($_COOKIE);
var_dump(session_id());
var_dump(SID);#包含着会话名以及会话 ID 的常量，格式为 "name=ID"，或者如果会话 ID 已经在适当的会话 cookie 中设定时则为空字符串。 这和 session_id() 返回的是同一个 ID。
var_dump($_SESSION);
$fileName = "/tmp/sess_6o0hvkae002muasoqoduio2ev1";
var_dump($fileName);
$fileSize = filesize($fileName);
$file = fopen($fileName, "r");
$sessionStr = fread($file, filesize($fileName));
var_dump($sessionStr);#"name|s:53:"a:3:{s:4:"name";i:1;s:3:"age";i:2;s:7:"country";i:3;}";"
$arrayStr = serialize(["name" => 1, "age" => 2, "country" => 3]);
var_dump($arrayStr);#"a:3:{s:4:"name";i:1;s:3:"age";i:2;s:7:"country";i:3;}"
