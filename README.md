# PHP development Docker image

Yet another PHP Docker image for development (based on Alpine Linux for minimal size)

> Focused on library/package development

Bundled with:

* XDebug enabled and configured for remote debugging
* Global Composer installation
* Additional installed extensions
  * [Multibyte String](http://php.net/manual/en/book.mbstring.php)
  * [cURL](http://php.net/manual/en/book.curl.php)
  * [OpenSSL](http://php.net/manual/en/book.openssl.php)
  * [Zlib](http://php.net/manual/en/book.zlib.php)
  * [BCMath](http://php.net/manual/en/book.bc.php)
  * [GD](http://php.net/manual/en/book.image.php)
  * [OPcache](http://php.net/manual/en/book.opcache.php)

## Versions available

* PHP 5.6 - (tags: 5.6, 5) - docker pull juliangut/phpdev:5.6 _([5.6/5/Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/5.6/Dockerfile))_
* PHP 7.0 - (tags: 7.0, 7, latest) - docker pull juliangut/phpdev:7.0 _([7.0/7/latest/Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/7.0/Dockerfile))_
* PHP 7.1-RC - (tags: 7.1-rc, rc) - docker pull juliangut/phpdev:7.1-rc _([7.1-rc/rc/Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/7.1-rc/Dockerfile))_

## Environment variables

#### XDEBUG_REMOTE_AUTOSTART

Auto start remote debugging.

_Defaults to `0`_

#### XDEBUG_REMOTE_CONNECT_BACK

Auto connect with requesting server.

_Defaults to `0`_

#### XDEBUG_REMOTE_PORT

Remote server port to connect to, IDE should be listening on this port.

_Defaults to `9000`_

#### XDEBUG_REMOTE_HOST

Remote server (host) IP to connect to. Not used if `XDEBUG_REMOTE_CONNECT_BACK` is activated.

_Defaults to auto discovered `host's ip`_

#### XDEBUG_IDE_KEY

Fixed remote session identifier.

_Not set by default_

## Volumes

#### /app

`/app` volume is the default working directory. You should mount your project root path in this volume.

#### /var/log/php

Logging volume for PHP error log and xDebug's log, trace and profile files.

## Usage

### Getting the image

```bash
docker pull juliangut/phpdev:latest
```

### Running a container

```bash
docker run -it -v $(pwd):/app juliangut/phpdev:latest
```

#### Running built-in server in a container

```bash
docker run -d -p 9000:9000 -v $(pwd):/app juliangut/phpdev:latest php -S 0.0.0.0:9000 -t /app/public
```

_Access running server on `http://localhost:9000`_

##### With Docker Compose
 
```yaml
app:
  image: juliangut/phpdev:latest
  ports:
    - "9000:9000"
  volumes:
    - .:/app
  command: "php -S 0.0.0.0:9000"
```

```bash
docker-compose up
```

#### Accessing the container

```bash
docker exec -it [container_id] /bin/bash
```

### Starting xDebug session

It is **not** recommended to have a fixed remote session identifier and an auto-started remote session using "XDEBUG_IDE_KEY" and "XDEBUG_REMOTE_AUTOSTART".

The preferred way of starting a remote debug session is by setting remote session identifier dynamically by one of the following means

* On browser by adding "XDEBUG_SESSION" cookie with the session identifier as its value. This is the preferred method. (There are browser plugins/extensions to toggle this cookie easily)
* On HTTP request (cURL) by adding "XDEBUG_SESSION_START" parameter to the URL or as a POST parameter. eg: `http://example.local/?XDEBUG_SESSION_START=PHPSTORM`
* On CLI by setting "idekey" value on "XDEBUG_CONFIG" environment variable. eg: `docker run  -e XDEBUG_CONFIG="idekey=PHPSTORM" -v $(pwd):/app juliangut/phpdev:latest`

## Extending the image

```
FROM juliangut/phpdev:latest

RUN docker-php-ext-install \
    pdo_mysql \
  && pecl install \
    mongodb \
    redis \
  && docker-php-ext-enable \
    mongodb \
    redis \

RUN composer global require phpunit/phpunit
```

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms.