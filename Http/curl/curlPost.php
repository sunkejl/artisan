<?php
/**
 * link https://packagist.org/packages/curl/curl
 */
require 'vendor/autoload.php';
$curl = new Curl\Curl();
$curl->post('http://www.example.com/login/', array(
    'username' => 'myusername',
    'password' => 'mypassword',
));
if ($curl->error) {
    echo $curl->error_code;
} else {
    echo $curl->response;
}