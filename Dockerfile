# Install the PHP dependencies using Composer
FROM composer:latest
WORKDIR /app

COPY composer*.json ./
RUN composer install

# Install the JS dependencies using NodeJS
FROM node:23-alpine
WORKDIR /app

COPY package*.json ./
RUN npm install

# Serve the site using PHP and Apache
FROM php:8.3-apache
WORKDIR /var/www/html
RUN rm -rf ./*

COPY . ./
COPY --from=0 /app/vendor ./vendor/
COPY --from=1 /app/node_modules ./node_modules/

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN a2enmod rewrite && service apache2 restart

EXPOSE 80
