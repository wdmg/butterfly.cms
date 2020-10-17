ARG PHP_IMAGE_VERSION=7.4
FROM php:${PHP_IMAGE_VERSION}-fpm

# Up-to-date packages manager
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y wget git unzip

# Install PHP XDebug extension
ARG PHP_USE_XDEBUG=0
RUN if [ $PHP_USE_XDEBUG = 1 ]; then \
        pecl install xdebug && docker-php-ext-enable xdebug \
    ;fi

# Configure PHP
ADD ./php.ini /usr/local/etc/php/php.ini

# Configure XDubug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install system packages for PHP extensions
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
        build-essential \
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

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

# Enable mod_rewrite for images with apache
RUN if command -v a2enmod >/dev/null 2>&1; then \
        a2enmod rewrite headers \
    ;fi

# Install Yii framework bash autocompletion
RUN curl -L https://raw.githubusercontent.com/yiisoft/yii2/master/contrib/completion/bash/yii \
        -o /etc/bash_completion.d/yii

# Install PHP memcached extension
ARG PHP_USE_MEMCACHED=0
RUN if [ $PHP_USE_MEMCACHED = 1 ]; then \
        apt-get install -y libmemcached11 libmemcachedutil2 libmemcached-dev | \
        pecl install memcached && echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini \
    ;fi

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Application environment
WORKDIR /var/www/public

# Install Butterfly.CMS and run entrypoint to init
RUN composer create-project --prefer-dist wdmg/butterfly.cms ./

# Run PHP server
CMD ["php-fpm"]

# Start configure Butterfly.CMS
RUN php init \
    --env=development \
    --overwrite=y \
    --dbhost=${DB_HOST} \
    --dbtype=mysql \
    --dbcharset=utf8 \
    --dbname=${DB_NAME} \
    --tbprefix=btf_ \
    --dbuser=${DB_USER} \
    --dbpassword=${DB_PASSWORD} \
    --create_db=y \
    --migrations=n