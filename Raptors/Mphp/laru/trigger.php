<?php
/**
 * fsockopen — 打开一个网络连接或者一个Unix套接字连接
 * 异步PHP，主要想要的效果就是，触发一个PHP脚本，然后立即返回，留它在服务器端慢慢执行。
 * 使用fsockopen连接到本地服务器，触发脚本执行，然后立即返回，不等待脚本执行完成。
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 10:57
 */

ignore_user_abort(true); //如果客户端断开连接，不会引起脚本abort.
set_time_limit(0);//取消脚本执行延时上限
function triggerRequest($url, $post_data = array(), $cookie = array())
{
    $url = "http://www.skf.com/api?a=b";
    $cookie = array();
    $post_data = array();
    $url_array = parse_url($url);
    $fp = fsockopen($url_array['host'], 80, $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
        return false;
    }

    $method = "GET";
    $getPath = $url_array['path'] . "?" . $url_array['query'];
    $header = $method . " " . $getPath;
    $header .= " HTTP/1.1\r\n";
    $header .= "Host:" . $url_array['host'] . "\r\n";

    $header .= "Connection:Close\r\n\r\n";
    if (!empty($cookie)) {
        $_cookie = strval(null);
        foreach ($cookie as $k => $v) {
            $_cookie .= $k . "=" . $v . "; ";
        }
        $cookie_str = "Cookie: " . base64_encode($_cookie) . " \r\n";//传递Cookie
        $header .= $cookie_str;
    }
    if (!empty($post_data)) {
        $_post = strval(null);
        foreach ($post_data as $k => $v) {
            $_post .= $k . "=" . $v . "&";
        }
        $post_str = "Content-Type: application/x-www-form-urlencoded\r\n";//POST数据
        $post_str .= "Content-Length: " . strlen($_post) . " \r\n";//POST数据的长度
        $post_str .= $_post . "\r\n\r\n "; //传递POST数据
        $header .= $post_str;
    }
    echo $header;
    fwrite($fp, $header);
    #不执行输出 立即返回
//    while (!feof($fp)) {
//        echo fgets($fp, 128);
//    }
    fclose($fp);
}


