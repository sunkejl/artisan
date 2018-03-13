命令行执行xdebug

需要在phpstorm 命令行执行

https://segmentfault.com/n/1330000010550625?token=c94eb35d61893de957a2e203a57cef69


```php
[Xdebug]
zend_extension="/usr/local/webserver/php5.2.17/lib/php/extensions/no-debug-non-zts-20060613/xdebug.so"  
xdebug.trace_output_dir="/tmp/php/xdebug"  
xdebug.profiler_output_dir="/tmp/php/xdebug"  
xdebug.profiler_output_name="callgrind.out.%s.%t"
xdebug.profiler_enable=On
xdebug.profiler_enable_trigger=1
xdebug.default_enable=On
xdebug.show_exception_trace=On
xdebug.show_local_vars=On
xdebug.max_nesting_level=300
xdebug.var_display_max_depth=-1
xdebug.dump_once=On
xdebug.dump_globals=On
xdebug.dump_undefined=On
xdebug.dump.REQUEST=*
xdebug.dump.SERVER=REQUEST_METHOD,REQUEST_URI,HTTP_USER_AGENT
xdebug.remote_connect_back=1
xdebug.remote_enable=1
xdebug.remote_handler=dbgp
xdebug.remote_mode=req
```

WinCacheGrind.exe