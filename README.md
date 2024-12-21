[![Docker Pulls](https://img.shields.io/docker/pulls/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)
[![Docker Stars](https://img.shields.io/docker/stars/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)

[![Build Status](https://github.com/juliangut/docker-phpdev/actions/workflows/docker-build.yml/badge.svg?branch=master&style=flat)](https://github.com/juliangut/docker-phpdev/actions)
**![Automated build](https://img.shields.io/badge/build-automated-brightgreen?style=flat-square)**

# PHP Docker images for development

PHP/PHP-FPM/Jenkins Docker images for development/CI, based on Alpine Linux for minimal size

Bundled with:

* UTC timezone
* Latest [Xdebug](https://xdebug.org/) (3.x) configured and enabled for development and debugging
* Latest [Composer](https://getcomposer.org/) (2.x) installed globally
* Installed PHP extensions: [Multibyte String](http://php.net/manual/en/book.mbstring.php), [cURL](http://php.net/manual/en/book.curl.php), [Intl](https://www.php.net/manual/en/book.intl.php), [OpenSSL](http://php.net/manual/en/book.openssl.php), [Zlib](http://php.net/manual/en/book.zlib.php), [BCMath](http://php.net/manual/en/book.bc.php), [GD](http://php.net/manual/en/book.image.php), [OPcache](http://php.net/manual/en/book.opcache.php)
* Installed PECL extensions: [APCu](https://www.php.net/manual/en/book.apcu.php)
* Includes [make](https://www.gnu.org/software/make/manual/make.html) utility
* Automatic Healthcheck on PHP-FPM images

## Available tags

#### CLI
|            |         |                                                                                              |                                                                                                        |
|------------|---------|----------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| latest     | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/latest?style=flat-square)     |
| cli-latest | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/cli-latest?style=flat-square) |
| cli        | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/cli?style=flat-square)        |
| 8          | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8?style=flat-square)          |
| 8.4        | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.4?style=flat-square)        |
| 8.3        | PHP 8.3 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.3/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.3?style=flat-square)        |
| 8.2        | PHP 8.2 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.2/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.2?style=flat-square)        |
| 8.1        | PHP 8.1 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.1/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.1?style=flat-square)        |
| 8.0        | PHP 8.0 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/8.0/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0?style=flat-square)        |
| 7          | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7?style=flat-square)          |
| 7.4        | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4?style=flat-square)        |

#### FPM

|            |         |                                                                                              |                                                                                                        |
|------------|---------|----------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| fpm-latest | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm-latest?style=flat-square) |
| fpm        | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm?style=flat-square)        |
| 8-fpm      | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8-fpm?style=flat-square)      |
| 8.4-fpm    | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.4-fpm?style=flat-square)    |
| 8.3-fpm    | PHP 8.3 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.3/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.3-fpm?style=flat-square)    |
| 8.2-fpm    | PHP 8.2 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.2/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.2-fpm?style=flat-square)    |
| 8.1-fpm    | PHP 8.1 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.1/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.1-fpm?style=flat-square)    |
| 8.0-fpm    | PHP 8.0 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/8.0/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0-fpm?style=flat-square)    |
| 7-fpm      | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-fpm?style=flat-square)      |
| 7.4-fpm    | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-fpm?style=flat-square)    |

#### Jenkins

|                |         |                                                                                                  |                                                                                                            |
|----------------|---------|--------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------|
| jenkins-latest | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins-latest?style=flat-square) |
| jenkins        | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins?style=flat-square)        |
| 8-jenkins      | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8-jenkins?style=flat-square)      |
| 8.4-jenkins    | PHP 8.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.4-jenkins?style=flat-square)    |
| 8.3-jenkins    | PHP 8.3 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.3/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.3-jenkins?style=flat-square)    |
| 8.2-jenkins    | PHP 8.2 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.2/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.2-jenkins?style=flat-square)    |
| 8.1-jenkins    | PHP 8.1 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.1/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.1-jenkins?style=flat-square)    |
| 8.0-jenkins    | PHP 8.0 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/8.0/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/8.0-jenkins?style=flat-square)    |
| 7-jenkins      | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-jenkins?style=flat-square)      |
| 7.4-jenkins    | PHP 7.4 | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.4/Dockerfile) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-jenkins?style=flat-square)    |

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
* Default: _auto-discovered host_

The remote server host to connect to

Auto discovery tries to use `host.docker.internal` host if defined or automatically detects remote host IP

###### XDEBUG_CLIENT_PORT

* Type: integer
* Default: `9003`

The remote server port to connect to

###### XDEBUG_FILE_LINK_FORMAT

* Type: string
* Default: _not set_

Protocol format to integrate IDEs with stack trace file links. You can provide your custom format or use one of the following: _phpstorm_, _idea_, _vscode_, _sublime_, _netbeans_, _atom_, _vim_, _emacs_, _gvim_, _textmate_ or _macvim_.

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

##### Composer authentication

If you work with privately hosted packages and repositories and your local composer is already configured you can share that configuration with your containers

```bash
docker run --rm -v `pwd`:/app -v ~/.composer/auth.json:/home/docker/.composer/auth.json juliangut/phpdev:latest composer [command]
```

#### Accessing a running container

```bash
docker exec -it [container_id] /bin/bash
```

### Starting a Xdebug debug session

The way of starting a debug session is by dynamically setting a session identifier by one of the following means

##### CLI

This will enable XDebug for each and every request

* Setting "XDEBUG_SESSION" environment variable on container start

##### Browser

This allows to specify which requests will have XDebug enabled 

* Setting "XDEBUG_SESSION" cookie with the session identifier as its value. eg: `curl -b "XDEBUG_SESSION=PHPSTORM" http://localhost:8080/`
* On HTTP request by adding "XDEBUG_SESSION_START" query parameter to the URI.  eg: `curl http://localhost:8080?XDEBUG_SESSION_START=PHPSTORM`
* On POST requests by adding a "XDEBUG_SESSION_START" parameter. eg: `curl -X POST -F "XDEBUG_SESSION_START=PHPSTORM" http://localhost:8080`

##### Browser support

There are [browser plugins/extensions](https://xdebug.org/docs/step_debug#browser-extensions) available to very easily toggle the required cookies

### Debugging with PHPStorm

#### Review Xdebug configuration

* Debug port must be the same previously defined in `XDEBUG_CLIENT_PORT` environment variable (9003 by default)

![PHPStorm XDebug configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_xdebug_config.jpg)

#### Create a server

* Server name will be used later so make it relevant
* Set `0.0.0.0` as Host to allow any
* Map your project root to `/app`

![PHPStorm server configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_server_config.jpg)

#### Start debugging

Start listening for incoming connections by toggling _Run > Start Listening for PHP Debug Connections_, or by clicking the phone icon

![PHPstorm start debug](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_debug_listen.jpg)

#### Start the container

Setting `PHP_IDE_CONFIG` environment variable to the server name you defined earlier, this will instruct PHPStorm which mapping to use

```bash
docker run -d -p 8080:8080 -e XDEBUG_SESSION="PHPSTORM" -e PHP_IDE_CONFIG="serverName=Testing" -v `pwd`:/app --add-host host.docker.internal:host-gateway juliangut/phpdev:latest php -S 0.0.0.0:8080 -t /app/public
```

##### Using Docker Compose

```yaml
version: "3"

services:
  app:
    image: juliangut/phpdev:latest
    ports:
      - 8080:8080
    environment:
      XDEBUG_SESSION: PHPSTORM
      PHP_IDE_CONFIG: serverName=Testing
    volumes:
      - .:/app
    extra_hosts:
      - host.docker.internal:host-gateway
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

If for whatever reason you need Composer downgraded to version 1

```
FROM juliangut/phpdev:latest

RUN composer self-update --1
```

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/juliangut/docker-phpdev/issues). Have a look at existing issues before

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms
