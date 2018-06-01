<?php
  /* Create the transformator handle */
  $h = xslt_create();

  /* Process the document */
  if (!xslt_process($h, 'news.rss', 'rss.xsl', 'news.html')) {
      /* If an error occured we print it */
      echo "Error(". xslt_errno($h). "): ". xslt_error($h)." \n";
  }

  /* Free the transformator */
  xslt_free($h);
?>
