<?php
/**
 * 模拟一个WEB浏览器的行为
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 11:31
 */
include "vendor/autoload.php";
include "Client.php";
use Acme\Client;

$client = new Client();
$crawler = $client->request('GET', 'http://www.skf.com');

// select the form and fill in some values
$form = $crawler->selectButton('Login')->form();
$form['login'] = 'symfonyfan';
$form['password'] = 'anypass';

// submit that form
$crawler = $client->submit($form);
