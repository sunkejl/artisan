<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 11:27
 */
require 'vendor/autoload.php';
$curl = new Curl\Curl();
$curl->get('http://www.skf.com/api', array(
    'foo' => 'keyword',
));
if ($curl->error) {
    echo $curl->error_code;
} else {
    echo $curl->response;
}



