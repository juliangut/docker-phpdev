###
#
# NOTE!
#
# This file has been automatically generated
#
# Do not edit it directly
#
###

FROM php:5.6-fpm-alpine

ARG BUILD_DATE
ARG VCS_REF
ARG XDEBUG_VERSION

LABEL org.label-schema.schema-version="1.0.0-rc1" \
  org.label-schema.name="juliangut/phpdev" \
  org.label-schema.description="PHP Docker image for development (based on Alpine Linux for minimal size)" \
  org.label-schema.vcs-url="https://github.com/juliangut/docker-phpdev" \
  org.label-schema.vcs-ref="$VCS_REF" \
  org.label-schema.build-date="$BUILD_DATE" \
  com.juliangut.maintainer="Julián Gutiérrez (juliangut@gmail.com)" \
  com.juliangut.php.version="5.6" \
  com.juliangut.php.extensions="bcmath, curl, gd, mbstring, opcache, openssl, xdebug, zlib" \
  com.juliangut.xdebug.version="$XDEBUG_VERSION"

RUN set -xe \
  && echo http://dl-3.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories \
  && apk add --no-cache --virtual .build-deps \
    tzdata \
    $PHPIZE_DEPS \
  \
  && cp /usr/share/zoneinfo/UTC /etc/localtime \
  && echo 'UTC' > /etc/timezone \
  \
  && apk add --no-cache \
    shadow \
    bash \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
  \
  && addgroup -g 1551 php-fpm \
  && adduser -u 1551 -H -G php-fpm -s /sbin/nologin -D php-fpm \
  && docker-php-ext-configure \
    gd \
      --enable-gd-native-ttf \
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
  && php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php -r "copy('https://composer.github.io/installer.sig', '/tmp/composer-setup.sig');"  \
    && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { echo 'Invalid Composer installer' . PHP_EOL; exit(1); }" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -f /tmp/composer-setup.php \
    && rm -f /tmp/composer-setup.sig \
    && composer global require hirak/prestissimo \
  \
  && mkdir -p /var/log/php \
  && touch /var/log/php/xdebug.log \
  && chmod 666 /var/log/php/xdebug.log

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_DISABLE_XDEBUG_WARN=1 \
  PATH="/root/.composer/vendor/bin:$PATH"

COPY php.ini $PHP_INI_DIR/conf.d/zz-php.ini
COPY xdebug.ini $PHP_INI_DIR/conf.d/zz-xdebug.ini

ENV PHP_FPM_CONF_DIR /usr/local/etc/php-fpm.d
COPY php-fpm.conf $PHP_FPM_CONF_DIR/zz-php-fpm.conf

VOLUME /app /var/log/php
WORKDIR /app

COPY docker-entrypoint /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]

CMD ["php-fpm"]
