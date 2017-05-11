<?php
/**
 * psr-0已弃用 合并到psr-4中
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 16:48
 */
require 'vendor/autoload.php';
$documentStore = new DocumentStore();
// Add HTML document
$htmlDoc = new HtmlDocument('http://php.net');
$documentStore->addDocument($htmlDoc);
// Add stream document
$streamDoc = new StreamDocument(fopen('stream.txt', 'rb'));
$documentStore->addDocument($streamDoc);
// Add terminal command document
$cmdDoc = new CommandOutputDocument('cat /etc/hosts');
$documentStore->addDocument($cmdDoc);
print_r($documentStore->getDocuments());
eval("echo 'ending'.PHP_EOL;");