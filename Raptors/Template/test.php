<?php
    /**
     * php模板
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/19
     * Time: 10:52
     */
    include "Template.php";
    include "CompileTools.php";
    $tpl = new Template(new CompileTools());
    $tpl->assign("name","sk");
    $tpl->show('index');
