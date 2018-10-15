<?php

require_once "HTML/Template/IT.php";

$list_items = array(
    'Computer Science',
    'Nuclear Physics',
    'Rocket Science',
    );
$tpl = new HTML_Template_IT('./templates');
$tpl->loadTemplateFile('it_list.tpl');
$tpl->setVariable('title', 'IT List Example');
foreach ($list_items as $item) {
    $tpl->setCurrentBlock("listentry");
    $tpl->setVariable("entry_text", $item);
    $tpl->parseCurrentBlock("cell");
    
}
$tpl->show();
