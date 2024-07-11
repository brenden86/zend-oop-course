# Dockerfile for php-fpm service
FROM php:8.2-fpm-alpine

# install PDO extension for interacting with database using PDO
RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-enable pdo pdo_mysql