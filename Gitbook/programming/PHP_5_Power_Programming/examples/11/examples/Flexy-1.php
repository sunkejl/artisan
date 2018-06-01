<?php   
        
require_once 'HTML/Template/Flexy.php';

$tpldir = 'templates';
$tpl = new HTML_Template_Flexy(array(
    'templateDir' => 'templates',
    'compileDir'  => 'compiled',
    ));
$tpl->compile('hello.tpl');

$view = new StdClass;
$view->title = 'Hello, World!';
$view->body = 'This is a test of HTML_Template_Flexy';
$tpl->outputObject($view);
