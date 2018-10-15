<html>
 <head><title>Article: <?php echo htmlspecialchars($t->title);?></title></head>
 <body bgcolor=white>
  <table width="70%">
   <tr><td><h2><?php echo htmlspecialchars($t->title);?></h2></td></tr>
   <tr><td><?php echo htmlspecialchars($t->tagline);?></td></tr>
   <tr><td><b><?php echo htmlspecialchars($t->abstract);?></b></td></tr>
   <tr><td align="center" style="font-size:x-small">
    By <a href="mailto:<?php echo htmlspecialchars($t->authoremail);?>"><?php echo htmlspecialchars($t->author);?></a> - <?php echo htmlspecialchars($t->articledate);?>
   </td></tr>
   <tr><td>
    <?php if ($t->imageurl)  {?>
    <table align="right">
     <tr><td><img src="<?php echo htmlspecialchars($t->imageurl);?>" align="right"></td></tr>
     <tr><td style="font-size:small; font-weight:bold"><?php echo htmlspecialchars($t->imagecaption);?></td></tr>
    </table>
    <?php }?>
    <?php echo $t->content;?>
   </td></tr>
  </table>
 </body>
</html>
