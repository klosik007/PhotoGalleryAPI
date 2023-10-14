FROM php:8.2-apache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./xdebug/xdebug.ini "${PHP_INI_DIR}/conf.d"
COPY / /var/www/html

WORKDIR /var/www/html