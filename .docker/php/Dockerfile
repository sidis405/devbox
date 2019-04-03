FROM php:7.2.16-fpm-stretch

COPY .docker/php/composer-installer.sh /usr/local/bin/composer-installer

RUN apt-get -yqq update \
    && apt-get -yqq install --no-install-recommends unzip \
    && chmod +x /usr/local/bin/composer-installer \
    && composer-installer \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version

WORKDIR /tmp
ADD composer.json composer.lock /tmp/
RUN mkdir -p database/seeds \
    && mkdir -p database/factories \
    && composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    && rm -rf composer.json composer.lock database/ vendor/


COPY . /var/www/html/
WORKDIR /var/www/html/
COPY .docker/php/php.ini /usr/local/etc/php/conf.d/
RUN chown -R www-data:www-data /var/www/html/ \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo_mysql

RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist



ARG CURR_USER_ID
ARG CURR_GROUP_ID
ARG USER_AND_GROUP

COPY .docker/php/modify-wwwdata.sh /usr/local/bin/modify-wwwdata
RUN chmod +x /usr/local/bin/modify-wwwdata && modify-wwwdata
