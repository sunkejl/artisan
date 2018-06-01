<?php
  /* Create the transformator handle */
  $h = xslt_create();

  /* Process the document */
  $result = xslt_process($h, 'file://news.rss', 'file://rss.xsl');

  /* If the transformation succeeded we echo it */
  if ($result) {
      echo $result;
  } else {
      echo "Error(". xslt_errno($h). "): ". xslt_error($h)." \n";
  }

  /* Free the transformator */
  xslt_free($h);
?>
