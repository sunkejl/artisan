http://stackoverflow.com/questions/18028531/php-curl-returning-error-505
 
 
Stupid URL spaces... this fixed it.
 ```
$qs = str_replace(' ', '+', $qs);
 ```
 
 
 
I'm assuming that with cURL you'll need to fully URL-encode the request parameters (so a space is converted to + etc), and that Firefox is doing this for you behind the scenes.
 
One way is to pass your arguments to http_build_query().