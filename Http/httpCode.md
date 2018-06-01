google 404
https://www.google.com/unknown

```php
    header("Content-type:application/json");
    header("HTTP/1.1 404 Not Found");
    echo json_encode(array("msg" => "fail", "code" => "404", "data" => ""));
```

```javascript
        $.ajax({
            type: "POST",
            url: "admin.php",  //url
            data: {
                m: "w"
            },
            success: function (data) {
            },
            error: function (xhr, exception,errorThrown) {
                console.log(xhr.status);//404
                console.log(xhr.responseText);//{"code":401,"msg":"\u5e93\u4f4d\u4e3a\u7a7aing","info":""}
                console.log(exception);//error  "timeout"（超时）, "error"（错误）, "abort"(中止), "parsererror"（解析错误）
                console.log(errorThrown);//Not Found 
            }
        })
```
    
IETF的全称是"互联网工程任务组"（Internet Engineering Task Force），主要目标是协调制定互联网标准。
http
https://tools.ietf.org/html/draft-ietf-httpbis-p2-semantics-12#page-28

```
   7.  Method Definitions . . . . . . . . . . . . . . . . . . . . . . 14
     7.1.  Safe and Idempotent Methods  . . . . . . . . . . . . . . . 15
       7.1.1.  Safe Methods . . . . . . . . . . . . . . . . . . . . . 15
       7.1.2.  Idempotent Methods . . . . . . . . . . . . . . . . . . 15
     7.2.  OPTIONS  . . . . . . . . . . . . . . . . . . . . . . . . . 15
     7.3.  GET  . . . . . . . . . . . . . . . . . . . . . . . . . . . 16
     7.4.  HEAD . . . . . . . . . . . . . . . . . . . . . . . . . . . 17
     7.5.  POST . . . . . . . . . . . . . . . . . . . . . . . . . . . 17
     7.6.  PUT  . . . . . . . . . . . . . . . . . . . . . . . . . . . 18
     7.7.  DELETE . . . . . . . . . . . . . . . . . . . . . . . . . . 19
     7.8.  TRACE  . . . . . . . . . . . . . . . . . . . . . . . . . . 20
     7.9.  CONNECT  . . . . . . . . . . . . . . . . . . . . . . . . . 20
   8.  Status Code Definitions  . . . . . . . . . . . . . . . . . . . 20
     8.1.  Informational 1xx  . . . . . . . . . . . . . . . . . . . . 20
       8.1.1.  100 Continue . . . . . . . . . . . . . . . . . . . . . 21
       8.1.2.  101 Switching Protocols  . . . . . . . . . . . . . . . 21
     8.2.  Successful 2xx . . . . . . . . . . . . . . . . . . . . . . 21
       8.2.1.  200 OK . . . . . . . . . . . . . . . . . . . . . . . . 22
       8.2.2.  201 Created  . . . . . . . . . . . . . . . . . . . . . 22
       8.2.3.  202 Accepted . . . . . . . . . . . . . . . . . . . . . 22
       8.2.4.  203 Non-Authoritative Information  . . . . . . . . . . 23
       8.2.5.  204 No Content . . . . . . . . . . . . . . . . . . . . 23
       8.2.6.  205 Reset Content  . . . . . . . . . . . . . . . . . . 23
       8.2.7.  206 Partial Content  . . . . . . . . . . . . . . . . . 24
     8.3.  Redirection 3xx  . . . . . . . . . . . . . . . . . . . . . 24
       8.3.1.  300 Multiple Choices . . . . . . . . . . . . . . . . . 24
       8.3.2.  301 Moved Permanently  . . . . . . . . . . . . . . . . 25
       8.3.3.  302 Found  . . . . . . . . . . . . . . . . . . . . . . 25
       8.3.4.  303 See Other  . . . . . . . . . . . . . . . . . . . . 26
       8.3.5.  304 Not Modified . . . . . . . . . . . . . . . . . . . 26
       8.3.6.  305 Use Proxy  . . . . . . . . . . . . . . . . . . . . 27
       8.3.7.  306 (Unused) . . . . . . . . . . . . . . . . . . . . . 27
       8.3.8.  307 Temporary Redirect . . . . . . . . . . . . . . . . 27
     8.4.  Client Error 4xx . . . . . . . . . . . . . . . . . . . . . 27
       8.4.1.  400 Bad Request  . . . . . . . . . . . . . . . . . . . 28
       8.4.2.  401 Unauthorized . . . . . . . . . . . . . . . . . . . 28
       8.4.3.  402 Payment Required . . . . . . . . . . . . . . . . . 28
       8.4.4.  403 Forbidden  . . . . . . . . . . . . . . . . . . . . 28
       8.4.5.  404 Not Found  . . . . . . . . . . . . . . . . . . . . 28
       8.4.6.  405 Method Not Allowed . . . . . . . . . . . . . . . . 28
       8.4.7.  406 Not Acceptable . . . . . . . . . . . . . . . . . . 28
       8.4.8.  407 Proxy Authentication Required  . . . . . . . . . . 29
       8.4.9.  408 Request Timeout  . . . . . . . . . . . . . . . . . 29
       8.4.10. 409 Conflict . . . . . . . . . . . . . . . . . . . . . 29
       8.4.11. 410 Gone . . . . . . . . . . . . . . . . . . . . . . . 30
       8.4.12. 411 Length Required  . . . . . . . . . . . . . . . . . 30
       8.4.13. 412 Precondition Failed  . . . . . . . . . . . . . . . 30
       8.4.14. 413 Request Entity Too Large . . . . . . . . . . . . . 30
       8.4.15. 414 URI Too Long . . . . . . . . . . . . . . . . . . . 31
       8.4.16. 415 Unsupported Media Type . . . . . . . . . . . . . . 31
       8.4.17. 416 Requested Range Not Satisfiable  . . . . . . . . . 31
       8.4.18. 417 Expectation Failed . . . . . . . . . . . . . . . . 31
     8.5.  Server Error 5xx . . . . . . . . . . . . . . . . . . . . . 31
       8.5.1.  500 Internal Server Error  . . . . . . . . . . . . . . 32
       8.5.2.  501 Not Implemented  . . . . . . . . . . . . . . . . . 32
       8.5.3.  502 Bad Gateway  . . . . . . . . . . . . . . . . . . . 32
       8.5.4.  503 Service Unavailable  . . . . . . . . . . . . . . . 32
       8.5.5.  504 Gateway Timeout  . . . . . . . . . . . . . . . . . 32
       8.5.6.  505 HTTP Version Not Supported . . . . . . . . . . . . 32
   9.  Header Field Definitions . . . . . . . . . . . . . . . . . . . 33
     9.1.  Allow  . . . . . . . . . . . . . . . . . . . . . . . . . . 33
     9.2.  Expect . . . . . . . . . . . . . . . . . . . . . . . . . . 33
     9.3.  From . . . . . . . . . . . . . . . . . . . . . . . . . . . 34
     9.4.  Location . . . . . . . . . . . . . . . . . . . . . . . . . 35
     9.5.  Max-Forwards . . . . . . . . . . . . . . . . . . . . . . . 36
     9.6.  Referer  . . . . . . . . . . . . . . . . . . . . . . . . . 36
     9.7.  Retry-After  . . . . . . . . . . . . . . . . . . . . . . . 37
     9.8.  Server . . . . . . . . . . . . . . . . . . . . . . . . . . 37
     9.9.  User-Agent . . . . . . . . . . . . . . . . . . . . . . . . 38

```
