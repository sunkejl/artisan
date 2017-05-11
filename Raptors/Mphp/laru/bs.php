<?php
/**
 * bs Browser/Server 浏览器还没实现
 * @link `nginx配置` http://stackoverflow.com/questions/4706525/php-flush-not-working  todo 未实现
 * @link http://www.laruence.com/2008/04/16/118.html
 * 在代码中使用ob_start(), 就相当于在php.ini中使用output_buffering=on一样，使用服务器缓存。
 * 在代码中使用ob_end_flush() 就相当于在php.ini中使用output_buffering = false一样，关闭服务器缓存.
 * Created by PhpStorm.
 * 用过set_cookie, header的，一定见过这样的提示信息：”Warning: Cannot modify header information – headers already sent by…..”, 这是因为通过HTTP协议通信，数据包会包含俩个部分，一个是Header,一个是data。一般来说，都是先Header部分，在Heaer部分指明了 Data部分的长度，然后使用\r\n\r\n来表示header部分结束，接下来是Data部分。
 * 当我们有任何输出的时候，Header部分就发送了，这个时候，你再想header函数来改变一些Header部分的域信息，就会得到上面的提示信息。
 * User: Administrator
 * Date: 2016/11/1
 * Time: 14:00
 */

//设置php.ini中output_buffering=0 或者使用ob_end_flush()关闭缓存
set_time_limit(0);
ob_start();//缓存住 不flush 不输出
for ($i = 0; $i < 10; $i++) {
    echo "Now Index is :" . $i;
    sleep(1);
    ob_flush();//强制输出
}