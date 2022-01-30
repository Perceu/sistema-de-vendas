FROM php:8.1-apache

WORKDIR /var/www/html

COPY 000-default.conf /etc/apache2/sites-available

RUN apt-get update && apt-get install -y libmcrypt-dev mcrypt zlib1g-dev libpng-dev git unzip libzip-dev

RUN docker-php-ext-install pdo_mysql exif pcntl bcmath gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite
