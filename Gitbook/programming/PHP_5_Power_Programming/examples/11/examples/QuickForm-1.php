<?php

require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/Object.php';
require_once 'HTML/Template/Flexy.php';

$form = new HTML_QuickForm('login', 'POST', 'login.php');
$form->addElement('text', 'user', 'User name:', 'size="10"');
$form->addRule('username', 'Please enter a user name!', 'required', null, 'client');
$form->addElement('password', 'pw', 'Password:', 'size="10"');
$form->addElement('submit', 'doit', 'Log in!');

$renderer = new HTML_QuickForm_Renderer_Object;
$form->accept($renderer);

$flexy_options = &PEAR::getStaticProperty('HTML_Template_Flexy', 'options');
$flexy_options = array(
    'templateDir' => dirname(__FILE__).'/templates',
    'compileDir' => 'compiled', // relative to templateDir
    );
$tpl = new HTML_Template_Flexy;

$view = new StdClass;
$view->form = $renderer->toObject();

// render and display the template
$tpl->compile('flexy_form.tpl');
$tpl->outputObject($view);
