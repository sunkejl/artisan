```fail pecl install  https://github.com/mente/php-amqp-benchmark/blob/master/Dockerfile
FROM php:7.0.12-cli

RUN apt-get update && apt-get install -y librabbitmq-dev libssh-dev \
    && docker-php-ext-install opcache bcmath sockets \
    && pecl install amqp \
    && docker-php-ext-enable amqp

RUN mkdir /bench

WORKDIR /bench

```



   17  wget http://pecl.php.net/get/amqp-1.9.3.tgz
   19  tar -zxvf amqp-1.9.3.tgz
   23  cd amqp-1.9.3
   24  phpize
   25  ./configure
   26  make
   27  make install
   30  php -i |grep ".ini"
   32  apt install vim
   35  vim /usr/local/etc/php/conf.d/docker-php-ext-ampq.ini
   36  php -m
