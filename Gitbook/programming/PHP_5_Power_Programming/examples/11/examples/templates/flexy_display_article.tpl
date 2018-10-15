<html>
 <head><title>Article: {title}</title></head>
 <body bgcolor=white>
  <table width="70%">
   <tr><td><h2>{title}</h2></td></tr>
   <tr><td>{tagline}</td></tr>
   <tr><td><b>{abstract}</b></td></tr>
   <tr><td align="center" style="font-size:x-small">
    By <a href="mailto:{authoremail}">{author}</a> - {articledate}
   </td></tr>
   <tr><td>
    {if:imageurl}
    <table align="right">
     <tr><td><img src="{imageurl}" align="right"></td></tr>
     <tr><td style="font-size:small; font-weight:bold">{imagecaption}</td></tr>
    </table>
    {end:}
    {content:h}
   </td></tr>
  </table>
 </body>
</html>
