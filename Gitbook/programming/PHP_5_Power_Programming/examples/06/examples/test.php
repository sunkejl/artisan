<?php

$mysqli = mysqli_connect("localhost", "test", "", "world");

/* check connection */
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = $mysqli->query($query)) {

   /* Get field information for all columns */
   while ($finfo = $result->fetch_field()) {
 
       printf("Name:    %s\n", $finfo->name);
       printf("Table:    %s\n", $finfo->table);
       printf("max. Len: %d\n", $finfo->max_length);
       printf("Flags:    %d\n", $finfo->flags);
       printf("Type:    %d\n\n", $finfo->type);
   }   
   $result->close();
}

/* close connection */
$mysqli->close();