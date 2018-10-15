<html>
  <head>
    <title><?php echo htmlspecialchars($t->title);?></title>
  </head>
  <body>
    <h1><?php echo htmlspecialchars($t->title);?></h1>
    <ul>
      <?php if (is_array($t->list_entries)  || is_object($t->list_entries)) foreach($t->list_entries as $entry_text) {?>
        <li><?php echo htmlspecialchars($entry_text);?>
      <?php }?>
    </ul>
    (End of list)
  </body>
</html>
