<?php

require_once "Cache/Lite/Output.php";

$time_s = utime();

if (empty($_GET['id'])) {
    die("please specify an article id!");
}

$cache = new Cache_Lite_Output(
    array('lifeTime' => 300, // 5 minutes
          'cacheDir' => '/tmp/article_cache/'));

if ($cache->start($_GET['id'], 'article')) {
    $cached = true;
} else {
    include_once "DB.php";
    include_once "HTML/Template/Flexy.php";

    $dbh = DB::connect("mysql://test@localhost/test");
    $article = $dbh->getRow(
        "SELECT * FROM articles WHERE id = ?",
        array($_GET['id']), DB_FETCHMODE_OBJECT);
    $dir = dirname(__FILE__);
    $tpl = new HTML_Template_Flexy(
        array('templateDir' => "$dir/templates",
              'compileDir' => "$dir/templates/compiled",
              'filters' => 'Php,SimpleTags,BodyOnly'));
    $tpl->compile('flexy_display_article.tpl');
    $tpl->outputObject($article);

    $cache->end();
    $cached = false;
}

$elapsed = utime() - $time_s;
printf("<div style=\"font-size:x-small\">".
       "(spent %.1fms %s)</div>\n", $elapsed * 1000,
       $cached ? "serving page from cache" : "generating page");
 
function utime() {
    list($usec, $sec) = explode(" ", microtime());
    return (double)$usec + $sec;
}