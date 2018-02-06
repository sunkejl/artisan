<html>
  <head>
    <title>{title}</title>
  </head>
  <body>
    <h1>{title}</h1>
    <ul>
      {foreach:list_entries,entry_text}
        <li>{entry_text}</li>
      {end:}
    </ul>
    (End of list)
  </body>
</html>
