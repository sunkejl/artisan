```
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4");
$result = curl_exec($ch);
//如果原接口是gb2312 需要转utf-8
if ($encode) {
    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
}
curl_close($ch);
```