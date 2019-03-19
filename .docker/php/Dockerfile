FROM php:7.1.9-fpm

COPY . /var/www/html/
WORKDIR /var/www/html/
COPY .docker/php/php.ini /usr/local/etc/php/conf.d/
RUN chown -R www-data:www-data /var/www/html/ \
    && docker-php-ext-install fileinfo \
    && docker-php-ext-install opcache
