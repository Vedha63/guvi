FROM php:8.1-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    libcurl4-openssl-dev pkg-config libssl-dev libicu-dev \
    g++ gnupg curl && \
    pecl install redis mongodb && \
    docker-php-ext-enable redis mongodb

WORKDIR /var/www/html
COPY . .

RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
