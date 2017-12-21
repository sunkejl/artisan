<?php
$url = 'http://username:password@hostname:9090/path?arg=value#anchor';

var_dump(parse_url($url)); //array(8) { 'scheme' => string(4) "http" 'host' => string(8) "hostname" 'port' => int(9090) 'user' => string(8) "username" 'pass' => string(8) "password" 'path' => string(5) "/path" 'query' => string(9) "arg=value" 'fragment' => string(6) "anchor" }
var_dump(parse_url($url, PHP_URL_SCHEME)); //string(4) "http"
var_dump(parse_url($url, PHP_URL_USER)); //string(8) "username"
var_dump(parse_url($url, PHP_URL_PASS)); //string(8) "password"
var_dump(parse_url($url, PHP_URL_HOST)); //string(8) "hostname"
var_dump(parse_url($url, PHP_URL_PORT)); //int(9090)
var_dump(parse_url($url, PHP_URL_PATH)); //string(5) "/path"
var_dump(parse_url($url, PHP_URL_QUERY)); //string(9) "arg=value"
var_dump(parse_url($url, PHP_URL_FRAGMENT)); //string(6) "anchor"


$str = "first=value&arr[]=foo+bar&arr[]=baz";

parse_str($str, $output);
echo $output['first'] . PHP_EOL;  // value
echo $output['arr'][0] . PHP_EOL; // foo bar
echo $output['arr'][1] . PHP_EOL; // baz

$arr = ["a" => 1, "b" => 2];
var_dump($hStr = http_build_query($arr));

parse_str($hStr, $hOut);
var_dump($hOut);

