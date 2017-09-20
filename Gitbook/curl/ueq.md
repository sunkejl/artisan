```
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)' );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
if (count($body)>0)
   curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
if(count($header)>0)
   curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
if($type == 'GET')
   curl_setopt($ch, CURLOPT_HTTPGET, true);
else//POST
   curl_setopt($ch, CURLOPT_POST, true);
$res=curl_exec($ch);
curl_close($ch);
```