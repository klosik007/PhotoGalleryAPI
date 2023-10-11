FROM php:8.2-apache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY / /var/www/html