ARG PHP_VERSION=8.2

FROM serversideup/php:beta-${PHP_VERSION}-fpm-nginx AS base

# TODO: Fix for gosu, remove when this is merged: https://github.com/serversideup/docker-php/pull/287
RUN docker-php-serversideup-dep-install-alpine "gosu" && \
    docker-php-serversideup-dep-install-debian "gosu"

##############################################################################

FROM base AS production

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .
