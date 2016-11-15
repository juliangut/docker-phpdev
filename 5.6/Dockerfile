FROM php:5.6-alpine

MAINTAINER Julián Gutiérrez <juliangut@gmail.com>

RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
  && apk add --no-cache \
    bash \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev

RUN docker-php-ext-configure \
    gd \
      --enable-gd-native-ttf \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install \
    gd \
    bcmath \
    opcache \
  && pecl install \
    xdebug \
  && docker-php-ext-enable \
    xdebug

RUN apk del .build-deps

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

VOLUME ["/app"]
WORKDIR /app

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["php", "-a"]
