使用nc 扫描端口
```
 nc -zv www.baidu.com 443 80 22
Connection to www.baidu.com 443 port [tcp/https] succeeded!
Connection to www.baidu.com 80 port [tcp/http] succeeded!


nc -zv 127.0.0.1 70-90
nc: connect to 127.0.0.1 port 70 (tcp) failed: Connection refused
...
nc: connect to 127.0.0.1 port 79 (tcp) failed: Connection refused
Connection to 127.0.0.1 80 port [tcp/http] succeeded!
nc: connect to 127.0.0.1 port 81 (tcp) failed: Connection refused
...
nc: connect to 127.0.0.1 port 90 (tcp) failed: Connection refused
```

 -z      Specifies that nc should just scan for listening daemons, without sending any data to them.
 
 -v      Have nc give more verbose output.
 
