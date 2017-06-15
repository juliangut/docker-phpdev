FROM php:7.1-fpm-alpine

LABEL description="PHP Docker image for development (based on Alpine Linux for minimal size)" \
  maintainer="Julián Gutiérrez (juliangut@gmail.com)" \
  name="juliangut/phpdev" \
  php_version="7.1" \
  php_extensions="bcmath, curl, gd, mbstring, opcache, openssl, xdebug, zlib" \
  xdebug_version="2.5.4"

RUN set -xe \
  && apk add --no-cache --virtual .build-deps \
    tzdata \
    $PHPIZE_DEPS \
  \
  && cp /usr/share/zoneinfo/UTC /etc/localtime \
  && echo 'UTC' > /etc/timezone \
  \
  && apk add --no-cache \
    bash \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
  \
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
    xdebug-2.5.4 \
  \
  && docker-php-ext-enable \
    xdebug \
  \
  && apk del .build-deps \
  && rm -rf /tmp/* /var/cache/apk/*

ENV PHP_FPM_CONF_DIR /usr/local/etc/php-fpm.d

COPY php-fpm.conf $PHP_FPM_CONF_DIR/zz-php-fpm.conf

COPY php.ini $PHP_INI_DIR/conf.d/zz-php.ini
COPY xdebug.ini $PHP_INI_DIR/conf.d/zz-xdebug.ini

RUN php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
  && php -r "copy('https://composer.github.io/installer.sig', '/tmp/composer-setup.sig');"  \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { echo 'Invalid Composer installer' . PHP_EOL; exit(1); }" \
  && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && rm -f /tmp/composer-setup.php

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_DISABLE_XDEBUG_WARN 1

ENV PATH /root/.composer/vendor/bin:$PATH

RUN mkdir -p /var/log/php

VOLUME /app /var/log/php
WORKDIR /app

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["php-fpm"]
