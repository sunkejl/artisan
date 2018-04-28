<?php
// 场景
// 要获取原生http头部 以获取session
// 拿到Set-Cookie: abcdef1523865923=123
// 这样的值
// get_headers http://php.net/manual/zh/function.get-headers.php 需要传入url 才能返回对应的头部
// getallheaders http://php.net/manual/zh/function.getallheaders.php  只能支持apache
//
//
//https://stackoverflow.com/questions/41978957/get-header-from-php-curl-response

// create curl resource
$ch = curl_init();

// set url
//curl_setopt($ch, CURLOPT_URL, "http://****.com/admin_login.php");
curl_setopt($ch, CURLOPT_URL, "http://adminlocal.boqii.com/admin_login.php");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//enable headers
curl_setopt($ch, CURLOPT_HEADER, 1);
//get only headers
curl_setopt($ch, CURLOPT_NOBODY, 1);

curl_setopt($ch, CURLOPT_PROXY, "172.16.54.147");

curl_setopt($ch, CURLOPT_PROXYPORT, 8888);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/x-www-form-urlencoded'));


curl_setopt($ch, CURLOPT_POST, true);
//post body
curl_setopt($ch, CURLOPT_POSTFIELDS, "selectbg=2&username=sunke&password=abc123&m=role_valid");
// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

echo $output;

exit;

//下面的处理方法可参考 但header里有俩个 Set-Cookie: 会发生覆盖
$headers = array();

$data = explode("\n", $output);

$headers['status'] = $data[0];

array_shift($data);

foreach ($data as $part) {
    $middle = explode(":", $part);
    $headers[trim($middle[0])] = trim($middle[1]);
}

//print all headers as array
echo "<pre>";
print_r($headers);
echo "</pre>";
