<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/1
 * Time: 22:54
 */
ini_set('display_errors',true);
error_reporting(E_ALL);
// example.com/web/front.php

require_once __DIR__ . '/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

//映射表
$map = array(
    '/hello' => 'hello',
    '/bye' => 'bye',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    //ob_start — 打开输出控制缓冲
    //此函数将打开输出缓冲。当输出缓冲激活后，脚本将不会输出内容（除http标头外），相反需要输出的内容被存储在内部缓冲区中。
    //内部缓冲区的内容可以用 ob_get_contents() 函数复制到一个字符串变量中。 想要输出存储在内部缓冲区中的内容，可以使用 ob_end_flush() 函数。另外， 使用 ob_end_clean() 函数会静默丢弃掉缓冲区的内容。
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    include sprintf(__DIR__.'/src/pages/%s.php', $map[$path]);
    $response = new Response(ob_get_clean());
} else {
    $response = new Response('Not Found', 404);
}

$response->send();