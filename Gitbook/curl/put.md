```
        $url = "http://dev-proxy-sale.boqii.com//api/channels ";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(compact("ids", "names", "codes","status")));
        $result = curl_exec($ch);
        curl_close($ch);
```



