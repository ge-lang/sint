FROM php:8.1-apache

RUN docker-php-ext-install mysqli \
    && printf "output_buffering = On\n" > /usr/local/etc/php/conf.d/output-buffering.ini

COPY docker/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /var/www/html
