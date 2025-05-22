FROM php:8.3.20-apache

WORKDIR /var/www

# COPY ./src /var/www

# Install dependencies and composer 
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libicu-dev
RUN command curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-configure intl    
RUN docker-php-ext-install pdo_mysql intl


RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/public|' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite