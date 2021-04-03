FROM php:8.0.3-apache
RUN yum -y update \
    yum -y upgrade \
    yum clean all
RUN docker-php-ext-install mysqli
RUN apk add freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev
RUN docker-php-ext-install -j$(nproc) iconv 
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ 
RUN docker-php-ext-install -j$(nproc) gd
COPY php.ini /usr/local/etc/php/php.ini