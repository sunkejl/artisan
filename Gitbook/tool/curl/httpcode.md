```
   $ch = curl_init();
// 设置URL和相应的选项
    $url = str_replace(' ', '+', $url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
// 抓取URL并把它传递给浏览器
    $res = curl_exec($ch);
    $error = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//  var_dump($httpCode);
// var_dump($error);httpCode=200;error=""
// 关闭cURL资源，并且释放系统资源
    curl_close($ch);
    $res = json_decode($res, true);
    return $res;
```
