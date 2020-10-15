FROM php:7.4-fpm

RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

ADD ./php.ini /usr/local/etc/php/php.ini

RUN apt-get install -y \
        git \
        htop \
        mc \
        libzip-dev \
        libc-client-dev \
        libkrb5-dev \
        libpng-dev \
        libjpeg-dev \
        libwebp-dev \
        libfreetype6-dev \
        libkrb5-dev \
        libicu-dev \
        zlib1g-dev \
        zip \
        ffmpeg \
        libmemcached11 \
        libmemcachedutil2 \
        build-essential \
        libmemcached-dev \
        gnupg2 \
        libpq-dev \
        libpq5 \
        libz-dev

RUN echo 'deb http://apt.postgresql.org/pub/repos/apt/ jessie-pgdg main 9.5' > /etc/apt/sources.list.d/pgdg.list

RUN apt-key adv --keyserver ha.pool.sks-keyservers.net --recv-keys B97B0AFCAA1A47F044F244A07FCC7D46ACCC4CF8

RUN apt-get update && apt-get install -y postgresql-client-9.5

RUN docker-php-ext-configure gd \
    --with-webp=/usr/include/ \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/ && docker-php-ext-install gd

RUN docker-php-ext-configure imap \
    --with-kerberos \
    --with-imap-ssl && docker-php-ext-install imap

RUN docker-php-ext-configure zip && docker-php-ext-install zip

RUN docker-php-ext-configure intl && docker-php-ext-install intl

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install exif
RUN docker-php-ext-install fileinfo


RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

RUN pecl install memcached && echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www