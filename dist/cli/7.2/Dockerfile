###
#
# NOTE!
#
# This file has been automatically generated
#
# Do not edit it directly
#
###

FROM php:7.2-alpine

ARG BUILD_DATE
ARG VCS_REF
ARG XDEBUG_VERSION

LABEL org.opencontainers.image.title="juliangut/phpdev" \
  org.opencontainers.image.description="PHP/PHP-FPM/Jenkins Docker image for development/CI, based on Alpine Linux for minimal size" \
  org.opencontainers.image.url="https://github.com/juliangut/docker-phpdev" \
  org.opencontainers.image.source="https://github.com/juliangut/docker-phpdev/tree/master/dist/cli/7.2" \
  org.opencontainers.image.revision="$VCS_REF" \
  org.opencontainers.image.created="$BUILD_DATE" \
  org.opencontainers.image.authors="Julián Gutiérrez (juliangut@gmail.com)" \
  org.opencontainers.image.licenses="BSD-3-Clause" \
  com.juliangut.php.version="7.2" \
  com.juliangut.php.extensions="bcmath, curl, gd, mbstring, opcache, openssl, xdebug, zlib" \
  com.juliangut.xdebug.version="$XDEBUG_VERSION"

RUN set -xe \
  && apk add --no-cache --virtual .build-deps \
    tzdata \
    $PHPIZE_DEPS \
  \
  && cp /usr/share/zoneinfo/UTC /etc/localtime \
  && echo "UTC" > /etc/timezone \
  \
  && apk add --no-cache \
    shadow \
    sudo \
    bash \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
  \
  && groupmod -n docker www-data \
  && usermod -l docker -m -d /home/docker -s /sbin/bash -G wheel -a www-data \
  && sed -e 's;^# \(%wheel.*NOPASSWD.*\);\1;g' -i /etc/sudoers \
  \
  && docker-php-ext-configure \
    gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
  \
  && docker-php-ext-install \
    gd \
    bcmath \
    opcache \
  \
  && pecl install \
    xdebug-$XDEBUG_VERSION \
  \
  && docker-php-ext-enable \
    xdebug \
  \
  && apk del .build-deps \
  && rm -rf /tmp/* /var/cache/apk/* \
  \
  && sed -i "s/bin\/ash/bin\/bash/" /etc/passwd \
  \
  && php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php -r "copy('https://composer.github.io/installer.sig', '/tmp/composer-setup.sig');"  \
    && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { echo 'Invalid Composer installer' . PHP_EOL; exit(1); }" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -f /tmp/composer-setup.php \
    && rm -f /tmp/composer-setup.sig \
    && composer global require hirak/prestissimo \
    && composer global clear-cache \
  \
  && mv /root/.composer /home/docker/.composer \
  && chown docker:docker -R /home/docker/.composer \
  \
  && mkdir -p /var/log/php \
  && touch /var/log/php/xdebug.log \
  && chown docker:docker -R /var/log/php \
  && chmod 774 -R /var/log/php

ENV STDOUT_LOG=0 \
  \
  XDEBUG_DISABLE=0 \
  XDEBUG_REMOTE_AUTOSTART=0 \
  XDEBUG_REMOTE_PORT=9000 \
  XDEBUG_PROFILER_ENABLE=0 \
  XDEBUG_AUTO_TRACE=0 \
  \
  OPCACHE_VALIDATE_TIMESTAMP=1 \
  OPCACHE_MEMORY_CONSUMPTION=128 \
  OPCACHE_MAX_ACCELERATED_FILES=1000 \
  \
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_DISABLE_XDEBUG_WARN=1 \
  \
  PATH="/home/docker/.composer/vendor/bin:$PATH"

COPY php.ini $PHP_INI_DIR/conf.d/zz-php.ini
COPY opcache.ini $PHP_INI_DIR/conf.d/zz-opcache.ini
COPY xdebug.ini $PHP_INI_DIR/conf.d/zz-xdebug.ini

VOLUME /app /var/log/php
WORKDIR /app

COPY docker-entrypoint /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]

CMD ["php", "-a"]

###
#
# NOTE!
#
# This file has been automatically generated
#
# Do not edit it directly
#
###
