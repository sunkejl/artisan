<?php
$array=[];
foreach ($array as $v) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_PROXY, "172.16.54.248");//设置代理 可以给fiddle 抓包
    curl_setopt($ch, CURLOPT_PROXYPORT, 8888);//代理端口
    $url = 'http://bqadmintb.boqii.com/admin.php';//指定host服务器
    $header = array(
        "Host" => "bqadmintbcc.boqii.com",
        "Connection" => "keep-alive",
        "X-Requested-With" => "XMLHttpRequest",
        "Content-Type" => "application/x-www-form-urlencoded",
    );
    $ua = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36";
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    $cookie = "UM_distinctid=15f9b18db7f4a7-0b79774279fcb7-5d153b16-1fa400-15f9b18db80c2a; cityId=31; __utma=137717295.330192151.1510281163.1510281163.1510281163.1; __utmz=137717295.1510281163.1.1.utmcsr=boqii.com|utmccn=(referral)|utmcmd=referral|utmcct=/; Hm_lvt_16256b8df60004da41bb33a24cce8ba7=1510135622,1510281109; _jzqx=1.1510135768.1510329686.3.jzqsr=shop%2Eboqii%2Ecom|jzqct=/pre-sale/69/23313%2Ehtml.jzqsr=shop%2Eboqii%2Ecom|jzqct=/global/; _jzqa=1.1870803887587533800.1510135768.1510281169.1510329686.3; NTKF_T2D_CLIENTID=guest82E6E94F-B32A-58BE-F729-9B19A7CA2ACA; PHPSESSID=2a8fa5b75567912d8d7b4bc1b294d540; boqiisid=2a8fa5b75567912d8d7b4bc1b294d540; td_cookie=18446744070112110483";
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_REFERER,
        "www.amazon.com");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $body = "m=orderform_orderglobal&type=getUeqExpressNumber&globalId={$v}";
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);#没这个 只会返回true
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo $v;
    echo $response;
    file_put_contents("a.txt", $v . " " . $response . "\n", FILE_APPEND);
}
