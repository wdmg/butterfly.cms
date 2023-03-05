#!/usr/bin/env -S docker build . --tag=example:v1 --network=host --file

FROM php:5.6-apache

RUN docker-php-ext-install mysqli mysql pdo pdo_mysql && docker-php-ext-enable mysqli mysql pdo pdo_mysql

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl

RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y git mc zlib1g-dev libmcrypt-dev libpng-dev nano vim --no-install-recommends \
    && docker-php-ext-install mcrypt zip

RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
RUN docker-php-ext-install gd

RUN pecl install xdebug-2.5.5 && docker-php-ext-enable xdebug

RUN printf '[date]\ndate.timezone = Europe/Moscow\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN touch /var/log/apache2/php_errors.log && chown www-data:www-data /var/log/apache2/php_errors.log

RUN printf '[errors]\nlog_errors = on \nerror_log = /var/log/apache2/php_errors.log\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN printf '[xdebug]\nzend_extension="xdebug.so"\nxdebug.mode=debug\nxdebug.client_host="127.0.0.1"\nxdebug.client_port="9003"\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /etc/apache2 && mkdir ssl && cd ssl && openssl req -new -x509 -days 1461 -nodes -out cert.pem -keyout cert.key -subj "/C=RU/ST=SPb/L=SPb/O=example Company/OU=IT Department/CN=example.dev/CN=development"

RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
