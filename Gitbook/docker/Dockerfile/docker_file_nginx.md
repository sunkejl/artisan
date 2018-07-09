```
FROM centos
RUN mkdir /data
WORKDIR /data
RUN yum update -y  >/data/yum_file 2>&1 &
RUN yum install wget gcc wget make gcc-c++ perl openssl-devel libxml2-devel libcurl-devel libpng-devel freetype* cmake git ncurses-devel bison -y

RUN wget http://7xsqmn.com1.z0.glb.clouddn.com/nginx-1.9.9.tar.gz
RUN wget ftp://mcrypt.hellug.gr/pub/crypto/mcrypt/attic/libmcrypt/libmcrypt-2.5.7.tar.gz
RUN tar -zxvf libmcrypt-2.5.7.tar.gz
WORKDIR /data/libmcrypt-2.5.7
RUN ./configure -prefix=/usr/local/
RUN make
RUN make install

WORKDIR /data
RUN tar -zxvf nginx-1.9.9.tar.gz
RUN wget https://zlib.net/fossils/zlib-1.2.8.tar.gz

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


WORKDIR /data/nginx-1.9.9
RUN ./configure --prefix=/usr/local/webserver/nginx-1.9.9 --with-http_ssl_module
RUN make
RUN make install

```



```
docker run -it -d -p 80:80 nginx_sk /bin/bash

server {
    listen       80;
    server_name  www.sk.com;
    root   /opt/www/sk;
    location / {
#allow 172.16.54.62;
#deny all;
        index  index.php app.php;
#try_files $uri $uri/ /app.php?$args;
        try_files $uri $uri/ /index.php?$args;
    }
    location ~ \.php$ {
#add_header 'Access-Control-Allow-Methods' 'GET';
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param   SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}
```
