<?php

require_once "HTML/Template/IT.php";

$tpl = new HTML_Template_IT('./templates');
$tpl->loadTemplateFile('hello.tpl');
$tpl->setVariable('title', 'Hello, World!');
$tpl->setVariable('body', 'This is a test of HTML_Template_IT!');
$tpl->show();
