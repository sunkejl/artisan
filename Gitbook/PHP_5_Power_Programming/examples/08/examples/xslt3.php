<?php

  /* Load the XML and XSL into memory and put them into the argument
   * array for use by the xslt_process() function. */
  $arguments = array(
       '/_xml' => file_get_contents('news.rss'),
       '/_xsl' => file_get_contents('rss.xsl'),
  );

  /* Allocate a new XSLT handler */
  $h = xslt_create();

  /* Process the document */
  $result = @xslt_process($h, 'arg:/_xml', 'arg:/_xsl', NULL, $arguments); 
  if ($result) {
      echo $result;
  } else {
      echo "Error(". xslt_errno($h). "): ". xslt_error($h)." \n";
  }

  /* Free the XSLT handler */
  xslt_free($h);
?>
