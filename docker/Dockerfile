#!/usr/bin/env -S docker build . --tag=example:v1 --network=host --file

FROM php:7.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl

RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y git mc zlib1g-dev libpng-dev nano vim --no-install-recommends \
    && docker-php-ext-install zip

RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.4 && docker-php-ext-enable mcrypt

RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
RUN docker-php-ext-install gd

RUN pecl channel-update pecl.php.net
RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y libmemcached11 libmemcachedutil2 build-essential libmemcached-dev libz-dev
RUN pecl install memcached-3.0.0
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

RUN apt-get -y update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt-get update \
    && apt-get install --no-install-recommends -y \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \

RUN docker-php-ext-install mbstring imagick pgsql

RUN docker-php-ext-install sockets && docker-php-ext-enable sockets
RUN docker-php-ext-install soap && docker-php-ext-enable soap

RUN printf '[date]\ndate.timezone = Europe/Moscow\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN touch /var/log/apache2/php_errors.log && chown www-data:www-data /var/log/apache2/php_errors.log

RUN printf '[errors]\nlog_errors = on \nerror_log = /var/log/apache2/php_errors.log\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN printf '[xdebug]\nzend_extension="xdebug.so"\nxdebug.mode=debug\nxdebug.client_host="127.0.0.1"\nxdebug.client_port="9003"\n\n' > /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /etc/apache2 && mkdir ssl && cd ssl && openssl req -new -x509 -days 1461 -nodes -out cert.pem -keyout cert.key -subj "/C=RU/ST=SPb/L=SPb/O=example Company/OU=IT Department/CN=example.com/CN=development"

RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

ENV LOCALTIME Europe/Kiev
ENV HTTPD_CONF_DIR /etc/apache2/conf-enabled/
ENV HTTPD__DocumentRoot /var/www/html
ENV HTTPD__LogFormat '"%a %l %u %t \"%r\" %>s %b \"%{Referer}i\" \"%{User-agent}i\"" common'

RUN echo 'sendmail_path = /usr/sbin/ssmtp -t' >> $PHP_INI_DIR/conf.d/00-default.ini && \
    sed -i "s/DocumentRoot.*/DocumentRoot \${HTTPD__DocumentRoot}/"  /etc/apache2/apache2.conf && \
    echo 'ServerName ${HOSTNAME}' > $HTTPD_CONF_DIR/00-default.conf && \
    echo 'ServerSignature Off' > /etc/apache2/conf-enabled/z-security.conf && \
    echo 'ServerTokens Minimal' >> /etc/apache2/conf-enabled/z-security.conf && \
    chmod a+w -R $HTTPD_CONF_DIR/ /etc/apache2/mods-enabled $PHP_INI_DIR/ && \
    rm /etc/apache2/sites-enabled/000-default.conf

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
