<?php
    require_once "XML/RSS.php";
    $cache_file = "/tmp/php.net.rss";

    /* Get the file if it is not cached, or if the file in the cache is too old */
    if (!file_exists($cache_file) || (filemtime($cache_file) < time() - 86400)) {
        copy("http://www.php.net/news.rss", $cache_file);
    }

    /* Instantiate the parser and start parsing */
    $r =& new XML_RSS($cache_file);
    $r->parse();

    $info = $r->getChannelInfo();
    var_dump($info);

    $info = $r->getItems();
    var_dump($info);

    /* Display the elements */
    foreach ($r->getItems() as $value) {
        echo "{$value['title']}\n{$value['description']}\n\t{$value['link']}\n\n";
    }
?>
