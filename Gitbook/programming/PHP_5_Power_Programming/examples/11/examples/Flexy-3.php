<?php   
        
require_once 'HTML/Template/Flexy.php';

$tpldir = 'templates';
$tpl = new HTML_Template_Flexy(array(
    'templateDir' => 'templates',
    'compileDir'  => 'compiled',
    ));
$tpl->compile('flexy_list2.tpl');

$view = new StdClass;
$view->title = 'Flexy Foreach Example';
$view->list_entries = array(
    'Computer Science',
    'Nuclear Physics',
    'Rocket Science',
    );
$tpl->outputObject($view);
