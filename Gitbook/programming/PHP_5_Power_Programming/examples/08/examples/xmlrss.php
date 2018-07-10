<?php
  require_once "XML/RSS.php";
  $cache_file = "/tmp/php.net.rss";

/* First we include the PEAR class and define the location of our cache file.
 * */

  if (!file_exists($cache_file) ||
      (filemtime($cache_file) < time() - 86400))
  {
      copy("http://www.php.net/news.rss", $cache_file);
  }

/* Then we check if the file has been cached before, and if the cache file is
 * not too old. (86400 seconds is one day). If it doesn't exist or it is too
 * old we download a new copy of php.net and store it in the cache file. */

  $r =& new XML_RSS($cache_file);
  $r->parse();

/* We instantiate the XML_RSS class with our RSS file as parameter and call the
 * parse() method. This method parses the RSS file into a structure which can
 * be fetch with several other methods: getChannelInfo() to return the title,
 * description and link of the website in an array:

array(3) {
  ["title"]=>
  string(27) "PHP: Hypertext Preprocessor"
  ["link"]=>
  string(19) "http://www.php.net/"
  ["description"]=>
  string(35) "The PHP scripting language web site"
}

 * and getItems() to return the title, description and link of the news item.
 * We use this last method to loop over all items and display them: */

  foreach ($r->getItems() as $value) {
      echo strtoupper($value['title']). "\n";
	  echo wordwrap($value['description']). "\n";
	  echo "\t{$value['link']}\n\n";
  }
?>
