FROM php:8.0-apache

# enable mod_rewrite for friendly URLs
RUN a2enmod rewrite

# more dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# copy all files for apache to deploy
COPY . /var/www/html/

# Project port
EXPOSE 80
