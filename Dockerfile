ARG PHP_VERSION=8

FROM serversideup/php:${PHP_VERSION}-fpm-nginx

USER root

RUN install-php-extensions mysqli

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

USER www-data