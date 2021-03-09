[![Docker Pulls](https://img.shields.io/docker/pulls/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)
[![Docker Stars](https://img.shields.io/docker/stars/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)

[![Docker Automated build](https://img.shields.io/docker/automated/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/builds/)
[![Docker Build Status](https://img.shields.io/docker/build/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/builds/)

# PHP development Docker images

PHP/PHP-FPM/Jenkins Docker images for development/CI, based on Alpine Linux for minimal size

Bundled with:

* UTC timezone
* Latest [Xdebug](https://xdebug.org/) (3.x), configured and enabled for debugging
* Latest [Composer](https://getcomposer.org/) (2.x) installed globally
* Installed PHP extensions: [Multibyte String](http://php.net/manual/en/book.mbstring.php), [cURL](http://php.net/manual/en/book.curl.php), [OpenSSL](http://php.net/manual/en/book.openssl.php), [Zlib](http://php.net/manual/en/book.zlib.php), [BCMath](http://php.net/manual/en/book.bc.php), [GD](http://php.net/manual/en/book.image.php), [OPcache](http://php.net/manual/en/book.opcache.php)

## Available tags

#### CLI

|            |            |                                                                                              |                                                                                                                                                                         |                                                                                                                   |
|------------|------------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------|
| latest     | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:latest)         | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/latest?label=size&style=flat-square)     |
| cli-latest | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/cli-latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:cli-latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/cli-latest?label=size&style=flat-square) |
| cli        | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/cli?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:cli)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/cli?label=size&style=flat-square)        |
| 8          | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8)                   | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8?label=size&style=flat-square)          |
| 8.0        | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8.0?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8.0)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0?label=size&style=flat-square)        |
| 7          | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7)                   | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7?label=size&style=flat-square)          |
| 7.4        | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4?label=size&style=flat-square)        |
| 7.3        | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3?label=size&style=flat-square)        |

#### FPM

|            |            |                                                                                              |                                                                                                                                                                         |                                                                                                                   |
|------------|------------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------|
| fpm-latest | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/fpm-latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:fpm-latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm-latest?label=size&style=flat-square) |
| fpm        | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:fpm)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm?label=size&style=flat-square)        |
| 8-fpm      | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8-fpm)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8-fpm?label=size&style=flat-square)      |
| 8.0-fpm    | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8.0-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8.0-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0-fpm?label=size&style=flat-square)    |
| 7-fpm      | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7-fpm)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-fpm?label=size&style=flat-square)      |
| 7.4-fpm    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-fpm?label=size&style=flat-square)    |
| 7.3-fpm    | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3-fpm?label=size&style=flat-square)    |

#### Jenkins

|                |            |                                                                                                  |                                                                                                                                                                                 |                                                                                                                       |
|----------------|------------|--------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------|
| jenkins-latest | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/jenkins-latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:jenkins-latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins-latest?label=size&style=flat-square) |
| jenkins        | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:jenkins)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins?label=size&style=flat-square)        |
| 8-jenkins      | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8-jenkins)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8-jenkins?label=size&style=flat-square)      |
| 8.0-jenkins    | PHP 8.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.0/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/8.0-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:8.0-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0-jenkins?label=size&style=flat-square)    |
| 7-jenkins      | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7-jenkins)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-jenkins?label=size&style=flat-square)      |
| 7.4-jenkins    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-jenkins?label=size&style=flat-square)    |
| 7.3-jenkins    | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3-jenkins?label=size&style=flat-square)    |

Jenkins' images are specially designed to be run as a Jenkins slave on a CI pipeline

## Environment variables

#### General

###### STDOUT_LOG

* Type: int
* Default: `0`

Output logs to stdout by setting a non zero value. By default PHP errors are sent to `/var/log/php/php.log`

This setting does not affect Xdebug session logs which will still be sent to `/var/log/php/debug.log`

#### Xdebug

###### XDEBUG_DISABLE

* Type: int
* Default: `0`
* _**Not recommended**, use XDEBUG_MODE=off instead_

Disable Xdebug by setting a non zero value

###### XDEBUG_MODE

* Type: string
* Default: `develop,coverage,debug`
* To disable Xdebug set to `off`

Running Xdebug mode. Review [xdebug.mode documentation](https://xdebug.org/docs/all_settings#mode)

###### XDEBUG_CLIENT_HOST

* Type: string
* Default: _auto-discovered host's ip_

The remote server IP (host IP) to connect to

###### XDEBUG_CLIENT_PORT

* Type: integer
* Default: `9003`

The remote server port to connect to

###### XDEBUG_FILE_LINK_FORMAT

* Type: string
* Default: _not set_

Protocol format to integrate IDEs with stack trace file links. You can provide your custom format or use one of the following: _phpstorm_, _idea_, _vscode_, _sublime_, _netbeans_, _vim_, _emacs_, _gvim_, _textmate_ or _macvim_.

If you use your custom format remember to escape the string for use in "sed". Review [xdebug.file_link_format documentation](https://xdebug.org/docs/all_settings#file_link_format)

#### Environment update guide

Due to the upgrade to Xdebug 3 some environment variables have been changed or removed from previous versions

* XDEBUG_REMOTE_HOST and XDEBUG_REMOTE_PORT have been renamed to XDEBUG_CLIENT_HOST and XDEBUG_CLIENT_PORT
* Default remote port for debug session has changed to `9003`
* XDEBUG_REMOTE_AUTOSTART has been removed, _see Starting a Xdebug debug session_
* XDEBUG_IDE_KEY has been removed, if needed, extend the image to include it as a Xdebug config
* XDEBUG_PROFILER_ENABLE and XDEBUG_AUTO_TRACE have been removed, their functionality is now controlled by XDEBUG_MODE

#### OPcache

###### OPCACHE_VALIDATE_TIMESTAMP

* Type: int
* Default: `1`

Disable file timestamp validation by setting to 0

###### OPCACHE_MEMORY_CONSUMPTION

* Type: int
* Default: `128`

Memory consumption limit in megabytes

###### OPCACHE_MAX_ACCELERATED_FILES

* Type: int
* Default: `1000`

Max number of in-memory cached files

## Volumes

#### /app

The default working directory. You should mount your project root path in this volume

#### /var/log/php

Logging volume for PHP logs, PHP-FPM logs and Xdebug files

## Usage

### Getting the image

```bash
docker pull juliangut/phpdev:latest

docker pull juliangut/phpdev:fpm-latest

docker pull juliangut/phpdev:jenkins-latest
```

### Running a container

```bash
docker run --rm -it -v `pwd`:/app juliangut/phpdev:latest

docker run -d -v `pwd`:/app juliangut/phpdev:fpm-latest
```

#### Running built-in server

```bash
docker run -d -p 8080:8080 -v `pwd`:/app juliangut/phpdev:latest php -S 0.0.0.0:8080 -t /app/public
```

##### With Docker Compose

```yaml
version: "3"

services:
  app:
    image: juliangut/phpdev:latest
    ports:
      - 8080:8080
    volumes:
      - .:/app
    command: "php -S 0.0.0.0:8080 -t /app/public"
```

_Access running server on "http://localhost:8080"_

#### Running a composer command

```bash
docker run --rm -v `pwd`:/app juliangut/phpdev:latest composer [command]

docker run --rm -v `pwd`:/app juliangut/phpdev:fpm-latest composer [command]
```

#### Accessing a running container

```bash
docker exec -it [container_id] /bin/bash
```

### Starting a Xdebug debug session

The way of starting a debug session is by dynamically setting a session identifier by one of the following means

##### CLI

* Setting "XDEBUG_SESSION" environment variable

##### Browser

* Setting "XDEBUG_SESSION" cookie with the session identifier as its value. eg: `curl -b "XDEBUG_SESSION=PHPSTORM" http://localhost:8080/`
* On HTTP request by adding "XDEBUG_SESSION_START" query parameter to the URI.  eg: `curl http://localhost:8080?XDEBUG_SESSION_START=PHPSTORM`
* On POST requests by adding a "XDEBUG_SESSION_START" parameter. eg: `curl -X POST -F "XDEBUG_SESSION_START=PHPSTORM" http://localhost:8080`

#### Browser support

There are [browser plugins/extensions](https://xdebug.org/docs/step_debug#browser-extensions) available to very easily toggle the required cookies

### Debugging with PHPStorm

#### Review Xdebug configuration

* Debug port must be the same previously defined in `XDEBUG_CLIENT_PORT` environment variable

![Xdebug configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_xdebug_config.jpg)

#### Create a server

* Server name will be used later so make it relevant
* Set `0.0.0.0` as Host to allow any
* Map your project root to `/app`

![server configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_server_config.jpg)

#### Start listening for Xdebug connections

Start listening for incoming connections by toggling _Run > Start Listening for PHP Debug Connections_, or by clicking the phone icon

![start listening](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_debug_listen.jpg)

#### Start the container

Setting `PHP_IDE_CONFIG` environment variable to the server name you defined earlier, this will instruct PHPStorm which mapping to use

```bash
docker run -d -p 8080:8080 -e PHP_IDE_CONFIG="serverName=Testing" -v `pwd`:/app juliangut/phpdev:latest php -S 0.0.0.0:8080 -t /app/public
```

#### Using Docker Compose

```yaml
version: "3"

services:
  app:
    image: juliangut/phpdev:latest
    ports:
      - 8080:8080
    environment:
      PHP_IDE_CONFIG: serverName=Testing
    volumes:
      - .:/app
    command: "php -S 0.0.0.0:8080 -t /app/public"
```

### Firewalld & NetworkManager notice

By default, firewalld blocks all outgoing connections from docker containers, such as Xdebug connection to port 9003 on the host. In order to allow docker containers to connect with Xdebug server you need to include `docker0` interface into a "trusted" zone both on NetworkManager and firewalld:

Assign docker0 interface to "trusted" zone and stop NetworkManager service
```
nmcli connection modify docker0 connection.zone trusted
systemctl stop NetworkManager.service
```

Assign "trusted" zone for docker0 interface on firewalld. Additionally, 172.0.0.0/8 source is added to cover any created docker network

```
firewall-cmd --permanent --zone=trusted --change-interface=docker0
firewall-cmd --permanent --zone=trusted --add-source=172.0.0.0/8
firewall-cmd --reload
```

Restart NetworkManager and reassign docker0 interface, just in case
```
systemctl start NetworkManager.service
nmcli connection modify docker0 connection.zone trusted
```

Restart docker service, so it recreates its iptables
```
systemctl restart docker.service
```

## Extending the image

The image comes with just the bare minimum PHP extensions, you will most probably need more

This is an example on extending the image adding extra extensions and composer dependencies

```
FROM juliangut/phpdev:latest

# Add PHP extensions
RUN set -xe \
  && apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
  \
  && docker-php-ext-configure \
    pdo_mysql \
      --with-pdo-mysql=mysqlnd \
  && docker-php-ext-install \
    pdo_mysql \
  \
  && pecl install \
    apcu \
    redis \
  && docker-php-ext-enable \
    apcu \
    redis \
  \
  && apk del .build-deps \
  && rm -rf /tmp/* /var/cache/apk/*

# Add global composer dependencies as 'docker' user
USER docker
RUN composer global require phpunit/phpunit

# Remember to always return to user 'root'
USER root
```

### Requiring Composer V1

If, for whatever reason, you need Composer downgraded to version 1

```
FROM juliangut/phpdev:latest

RUN composer self-update --1
```

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/event-sourcing/issues). Have a look at existing issues before

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms
