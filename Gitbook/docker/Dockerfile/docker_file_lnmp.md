```
FROM centos
MAINTAINER sunke sunkejl@live.com
RUN mkdir /data
WORKDIR /data
RUN yum update -y  >/data/yum_file 2>&1 &
RUN date; sleep 10; date
RUN yum install wget gcc wget make gcc-c++ perl openssl-devel libxml2-devel libcurl-devel libpng-devel freetype* cmake git ncurses-devel bison -y
 
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/redis-2.8.8.tar.gz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/mysql-5.7.16.tar.gz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/php-5.6.24.tar.gz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/xdebug-2.2.7.tgz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/nginx-1.9.9.tar.gz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/phpredis-2.2.4.tar.gz
RUN wget ftp://mcrypt.hellug.gr/pub/crypto/mcrypt/attic/libmcrypt/libmcrypt-2.5.7.tar.gz
RUN tar -zxvf libmcrypt-2.5.7.tar.gz
WORKDIR /data/libmcrypt-2.5.7
RUN ./configure -prefix=/usr/local/
RUN make
RUN make install
 
WORKDIR /data
RUN tar -zxvf nginx-1.9.9.tar.gz
RUN wget http://zlib.net/zlib-1.2.8.tar.gz
RUN tar -zxf zlib-1.2.8.tar.gz
WORKDIR /data/zlib-1.2.8
RUN ./configure
RUN make
RUN make install
WORKDIR /data
#RUN wget ftp://ftp.csx.cam.ac.uk/pub/software/programming/pcre/pcre-8.39.tar.gz
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/pcre-8.39.tar.gz
RUN tar -zxf pcre-8.39.tar.gz
WORKDIR /data/pcre-8.39
RUN ./configure
RUN make
RUN make install
WORKDIR /data
RUN tar -zxvf redis-2.8.8.tar.gz
WORKDIR /data/redis-2.8.8
RUN make PREFIX=/usr/local/webserver/redis install
#./redis-cli incr a
#./redis-server
WORKDIR /data/nginx-1.9.9
RUN ./configure --prefix=/usr/local/webserver/nginx-1.9.9 --with-http_ssl_module
RUN make
RUN make install
 
WORKDIR /data
RUN  tar -zxvf php-5.6.24.tar.gz
WORKDIR /data/php-5.6.24
RUN ./configure --prefix=/usr/local/webserver/php-5.6.24 --with-config-file-path=/etc/php --enable-fpm --enable-pcntl --enable-mysqlnd --enable-opcache=no --ena                                                                             ble-sockets --enable-sysvmsg --enable-sysvsem --enable-sysvshm --enable-shmop --enable-zip=no --enable-soap --enable-xml --enable-mbstring --disable-rpath --dis                                                                             able-debug --disable-fileinfo --with-mysql=mysqlnd --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd --with-pcre-regex --with-iconv --with-zlib --with-mcrypt --wit                                                                             h-gd --with-openssl --with-mhash --with-xmlrpc --with-curl --with-imap-ssl --with-freetype-dir=/usr/include/freetype2/freetype
RUN make
RUN make install
RUN cp /usr/local/webserver/php-5.6.24/etc/php-fpm.conf.default /usr/local/webserver/php-5.6.24/etc/php-fpm.conf
 
WORKDIR /data
RUN yum install autoconf -y
RUN tar -zxvf xdebug-2.2.7.tgz
WORKDIR xdebug-2.2.7
RUN /usr/local/webserver/php-5.6.24/bin/phpize
RUN ./configure --with-php-config=/usr/local/webserver/php-5.6.24/bin/php-config
RUN make
RUN make install
 
WORKDIR /data/php-5.6.24
RUN mkdir /etc/php
RUN cp php.ini-development /etc/php/php.ini
 
WORKDIR /data
RUN tar -zxvf phpredis-2.2.4.tar.gz
WORKDIR phpredis-2.2.4/
RUN /usr/local/webserver/php-5.6.24/bin/phpize
RUN ./configure --with-php-config=/usr/local/webserver/php-5.6.24/bin/php-config
RUN ./configure --with-php-config=/usr/local/webserver/php-5.6.24/bin/php-config
RUN make
RUN make install
 
WORKDIR /data
RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/swoole-src-1.8.12-stable.tar.gz
RUN tar -zxvf swoole-src-1.8.12-stable.tar.gz
WORKDIR swoole-src-1.8.12-stable
RUN /usr/local/webserver/php-5.6.24/bin/phpize
RUN ./configure --with-php-config=/usr/local/webserver/php-5.6.24/bin/php-config
RUN make
RUN make install
 
WORKDIR /data
RUN tar zxvf mysql-5.7.16.tar.gz
RUN groupadd mysql
RUN useradd -r -g mysql -s /bin/false mysql
 
 
WORKDIR /data/mysql-5.7.16
RUN cmake -DCMAKE_INSTALL_PREFIX=/usr/local/webserver/mysql  -DMYSQL_DATADIR=/mysql/data  -DMYSQL_UNIX_ADDR=/tmp/mysql.sock -DDEFAULT_CHARSET=utf8 -DDEFAULT_COL                                                                             LATION=utf8_general_ci  -DEXTRA_CHARSETS=all  -DENABLED_LOCAL_INFILE=1 -DDOWNLOAD_BOOST=1 -DWITH_BOOST=/usr/local/webserver/boost
RUN make
RUN make install
RUN mkdir -p /mysql/data
WORKDIR /usr/local/webserver/mysql/bin
 
 
#RUN ./mysqld --initialize   --user=mysql --datadir=/mysql/data --basedir=/usr/local/webserver/mysql --socket=/tmp/mysql.sock >/data/mysql_pass.md 2>&1 &
#mysql>ALTER USER 'root'@'localhost' IDENTIFIED BY 'MyNewPass';
 
 
#extension="redis.so"
#extension="swoole.so"
#
#[Xdebug]
#zend_extension="xdebug.so"
#xdebug.trace_output_dir="/tmp/php/xdebug"
#xdebug.profiler_output_dir="/tmp/php/xdebug"
#xdebug.profiler_output_name="callgrind.out.%s.%t"
#xdebug.profiler_enable=On
#xdebug.profiler_enable_trigger=1
#xdebug.default_enable=On
#xdebug.show_exception_trace=Off
#xdebug.show_local_vars=0
#xdebug.max_nesting_level=300
#xdebug.var_display_max_depth=-1
#xdebug.dump_once=On
#xdebug.dump_globals=On
#xdebug.dump_undefined=On
#xdebug.dump.REQUEST=*

```


```5.2机器
xdebug.trace_output_dir="/tmp/php/xdebug"
xdebug.profiler_output_dir="/tmp/php/xdebug"
xdebug.profiler_output_name="callgrind.out.%s.%t"
xdebug.profiler_enable=On
xdebug.profiler_enable_trigger=1
xdebug.default_enable=On
xdebug.show_exception_trace=0
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