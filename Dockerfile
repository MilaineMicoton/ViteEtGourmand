FROM php:8.2.30-fpm-alpine3.23

RUN docker-php-ext-install mysqli pdo pdo_mysql