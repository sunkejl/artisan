<?php   
        
require_once 'HTML/Template/Flexy.php';
require_once 'HTML/Template/Flexy/Element.php';

$tpldir = 'templates';
$tpl = new HTML_Template_Flexy(array(
    'templateDir' => 'templates',
    'compileDir'  => 'compiled',
    ));
$tpl->compile('flexy_form.tpl');

$elements = array(
    'myform' => new HTML_Template_Flexy_Element('form'),
    );

$view = new StdClass;
$view->elements = $elements;
$view->title = 'Flexy Form Example';
$view->user_label = 'User name:';
$view->pw_label = 'Password:';
$tpl->outputObject($view);
