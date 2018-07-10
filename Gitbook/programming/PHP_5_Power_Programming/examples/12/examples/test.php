<?php

function redirect($url)
{
    include_once "Net/URL.php";
    $url_obj = new Net_URL($url);
    $url = $url_obj->getURL();
    header("Location: $url");
    exit;
}

redirect('/foo.php');
