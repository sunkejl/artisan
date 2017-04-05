<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 10:11
 */
require 'vendor/autoload.php';
$curl = new Curl\Curl();
$curl->get('http://www.example.com/');

$curl = new Curl\Curl();
$curl->get('http://www.example.com/search', array(
    'q' => 'keyword',
));

$curl = new Curl\Curl();
$curl->post('http://www.example.com/login/', array(
    'username' => 'myusername',
    'password' => 'mypassword',
));

$curl = new Curl\Curl();
$curl->setBasicAuthentication('username', 'password');
$curl->setUserAgent('');
$curl->setReferrer('');
$curl->setHeader('X-Requested-With', 'XMLHttpRequest');
$curl->setCookie('key', 'value');
$curl->get('http://www.example.com/');

if ($curl->error) {
    echo $curl->error_code;
} else {
    echo $curl->response;
}

var_dump($curl->request_headers);
var_dump($curl->response_headers);


$curl = new Curl\Curl();
$curl->setOpt(CURLOPT_RETURNTRANSFER, true);
$curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
$curl->get('https://encrypted.example.com/');
$curl = new Curl\Curl();
$curl->put('http://api.example.com/user/', array(
    'first_name' => 'Zach',
    'last_name' => 'Borboa',
));
$curl = new Curl\Curl();
$curl->patch('http://api.example.com/profile/', array(
    'image' => '@path/to/file.jpg',
));
$curl = new Curl\Curl();
$curl->delete('http://api.example.com/user/', array(
    'id' => '1234',
));
$curl->close();