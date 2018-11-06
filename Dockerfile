FROM php:7.2.1-apache
LABEL group cdp_1_6

RUN docker-php-ext-install mysqli pdo pdo_mysql
