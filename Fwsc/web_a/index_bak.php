<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/1
 * Time: 18:17
 */
$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');
#XSS (Cross-Site Scripting)攻击者传入js让打开者执行
#That's one of the reasons why using a template engine like Twig, where auto-escaping is enabled by default
printf(htmlspecialchars($input));