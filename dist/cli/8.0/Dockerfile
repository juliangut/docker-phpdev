###
#
# NOTE
#
# This file has been automatically generated
#
# Do not edit it directly
#
###

FROM php:8.0-cli-alpine

ARG BUILD_DATE
ARG VCS_REF
ARG XDEBUG_VERSION

LABEL org.opencontainers.image.title="juliangut/phpdev" \
  org.opencontainers.image.description="PHP/PHP-FPM/Jenkins Docker image for development/CI, based on Alpine Linux for minimal size" \
  org.opencontainers.image.url="https://github.com/juliangut/docker-phpdev" \
  org.opencontainers.image.source="https://github.com/juliangut/docker-phpdev/tree/master/dist/cli/8.0" \
  org.opencontainers.image.revision="$VCS_REF" \
  org.opencontainers.image.created="$BUILD_DATE" \
  org.opencontainers.image.authors="Julián Gutiérrez (juliangut@gmail.com)" \
  org.opencontainers.image.licenses="BSD-3-Clause" \
  com.juliangut.php.version="8.0" \
  com.juliangut.php.extensions="bcmath, curl, gd, mbstring, opcache, openssl, zlib" \
  com.juliangut.pecl.extensions="apcu, xdebug" \
  com.juliangut.xdebug.version="$XDEBUG_VERSION"

RUN set -xe \
  && apk add --no-cache --virtual .build-deps \
    linux-headers \
    tzdata \
    $PHPIZE_DEPS \
    icu-dev \
  \
  && cp /usr/share/zoneinfo/UTC /etc/localtime \
  && echo "UTC" > /etc/timezone \
  \
  && apk add --no-cache \
    shadow \
    sudo \
    bash \
    make \
    icu \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
  \
  && groupmod -n docker www-data \
  && usermod -l docker -m -d /home/docker -s /sbin/bash -G wheel -a www-data \
  && sed -e 's;^# \(%wheel.*NOPASSWD.*\);\1;g' -i /etc/sudoers \
  \
  && mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini \
  \
  && docker-php-ext-configure \
    intl \
  && docker-php-ext-configure \
    gd \
      --with-freetype \
      --with-jpeg \
      --with-webp \
  \
  && docker-php-ext-install -j$(nproc) \
    intl \
    gd \
    bcmath \
    opcache \
  \
  && pecl update-channels \
  && pecl install \
    apcu \
    xdebug-$XDEBUG_VERSION \
  \
  && docker-php-ext-enable \
    apcu \
    xdebug \
  \
  && apk del .build-deps \
  && pecl clear-cache \
  && rm -rf /tmp/* /var/cache/apk/* /usr/share/php \
  \
  && sed -i "s/bin\/ash/bin\/bash/" /etc/passwd \
  \
  && mkdir /app \
  && chown docker:docker /app \
  \
  && mkdir -p /var/log/php \
  && touch /var/log/php/xdebug.log \
  && chown docker:docker -R /var/log/php \
  && chmod 774 -R /var/log/php \
  \
  && mkdir /home/docker/.composer \
  && chown docker:docker -R /home/docker/.composer

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV STDOUT_LOG=0 \
  \
  OPCACHE_VALIDATE_TIMESTAMP=1 \
  OPCACHE_MEMORY_CONSUMPTION=128 \
  OPCACHE_MAX_ACCELERATED_FILES=1000 \
  \
  COMPOSER_ALLOW_SUPERUSER=1 \
  \
  XDEBUG_DISABLE=0 \
  XDEBUG_MODE=develop,coverage,debug \
  XDEBUG_CLIENT_PORT=9003 \
  \
  COMPOSER_DISABLE_XDEBUG_WARN=1 \
  \
  PATH="/home/docker/.composer/vendor/bin:$PATH"

COPY php.ini $PHP_INI_DIR/conf.d/zz-php.ini
COPY php-opcache.ini $PHP_INI_DIR/conf.d/zz-opcache.ini
COPY php-apc.ini $PHP_INI_DIR/conf.d/zz-apc.ini
COPY php-xdebug.ini $PHP_INI_DIR/conf.d/zz-xdebug.ini

VOLUME /app /var/log/php
WORKDIR /app

COPY docker-entrypoint /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]

CMD ["php", "-a"]

###
#
# NOTE
#
# This file has been automatically generated
#
# Do not edit it directly
#
###
