FROM php:7.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    docker-php-ext-install opcache \
    && docker-php-ext-install pdo_mysql

EXPOSE 9000
