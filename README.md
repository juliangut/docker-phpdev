[![Docker Pulls](https://img.shields.io/docker/pulls/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)
[![Docker Stars](https://img.shields.io/docker/stars/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)

[![Docker Automated build](https://img.shields.io/docker/automated/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/builds/)
[![Docker Build Status](https://img.shields.io/docker/build/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/builds/)

# PHP development Docker image

PHP/PHP-FPM/Jenkins Docker image for development/CI, based on Alpine Linux for minimal size

Bundled with:

* UTC timezone
* Latest [Xdebug](https://xdebug.org/), configured and enabled for remote debugging
* Latest [Composer](https://getcomposer.org/) installed globally
* Installed PHP extensions: [Multibyte String](http://php.net/manual/en/book.mbstring.php), [cURL](http://php.net/manual/en/book.curl.php), [OpenSSL](http://php.net/manual/en/book.openssl.php), [Zlib](http://php.net/manual/en/book.zlib.php), [BCMath](http://php.net/manual/en/book.bc.php), [GD](http://php.net/manual/en/book.image.php), [OPcache](http://php.net/manual/en/book.opcache.php)

### Note

Xdebug 3 has been released and will be available in next release, watch out for image configuration changes!

## Available tags

#### CLI

|        |            |                                                                                              |                                                                                                                                                                 |                                                                                                               |
|--------|------------|----------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------|
| latest | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/latest?label=size&style=flat-square) |
| cli    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/cli?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:cli)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/cli?label=size&style=flat-square)    |
| 7      | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7?label=size&style=flat-square)      |
| 7.4    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4?label=size&style=flat-square)    |
| 7.3    | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3?label=size&style=flat-square)    |
| 7.2    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/cli/7.2/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.2?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.2)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.2?label=size&style=flat-square)    |

#### FPM

|            |            |                                                                                              |                                                                                                                                                                         |                                                                                                                   |
|------------|------------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------|
| fpm-latest | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/fpm-latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:fpm-latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm-latest?label=size&style=flat-square) |
| fpm        | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:fpm)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/fpm?label=size&style=flat-square)        |
| 7-fpm      | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7-fpm)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-fpm?label=size&style=flat-square)      |
| 7.4-fpm    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-fpm?label=size&style=flat-square)    |
| 7.3-fpm    | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3-fpm?label=size&style=flat-square)    |
| 7.2-fpm    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.2/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.2-fpm?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.2-fpm)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.2-fpm?label=size&style=flat-square)    |

#### Jenkins

|                |            |                                                                                                  |                                                                                                                                                                                 |                                                                                                                       |
|----------------|------------|--------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------|
| jenkins-latest | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/jenkins-latest?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:jenkins-latest) | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins-latest?label=size&style=flat-square) |
| jenkins        | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:jenkins)               | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/jenkins?label=size&style=flat-square)        |
| 7-jenkins      | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7-jenkins)           | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7-jenkins?label=size&style=flat-square)      |
| 7.4-jenkins    | PHP 7.4    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.4/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.4-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.4-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.4-jenkins?label=size&style=flat-square)    |
| 7.3-jenkins    | PHP 7.3    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.3-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.3-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.3-jenkins?label=size&style=flat-square)    |
| 7.2-jenkins    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.2/Dockerfile) | [![Docker layers](https://img.shields.io/microbadger/layers/juliangut/phpdev/7.2-jenkins?style=flat-square)](https://microbadger.com/images/juliangut/phpdev:7.2-jenkins)       | ![Docker size](https://img.shields.io/docker/image-size/juliangut/phpdev/7.2-jenkins?label=size&style=flat-square)    |

Jenkins' images are specially designed to be run as a Jenkins slave on a CI pipeline

## Environment variables

#### General

###### STDOUT_LOG

* Type: int
* Default: 0

Output logs to stdout by setting a non zero value. By default PHP errors are sent to `/var/log/php/php.log`

#### Xdebug

###### XDEBUG_DISABLE

* Type: int
* Default: 0

Disable Xdebug by setting a non zero value

###### XDEBUG_REMOTE_HOST

* Type: string
* Default: auto-discovered host's ip

Remote server IP (host IP) to connect to

###### XDEBUG_REMOTE_PORT

* Type: integer
* Default: 9000

Remote server port to connect to, IDE should be listening on this port

###### XDEBUG_REMOTE_AUTOSTART

* Type: integer
* Default: 0
* _**Usage not recommended**, read Using Xdebug section_

Auto start remote debugging

###### XDEBUG_PROFILER_ENABLE

* Type: int
* Default: 0

Enable Xdebug profiler by setting a non zero value. Output dir es /var/log/php

###### XDEBUG_AUTO_TRACE

* Type: int
* Default: 0

Enable Xdebug trace by setting a non zero value. Output dir es /var/log/php

###### XDEBUG_IDE_KEY

* Type: string
* Default: not set
* _**Usage not recommended**, read Using Xdebug section_ 

Fixed remote session identifier

_Note: escape the string for use in sed_

###### XDEBUG_FILE_LINK_FORMAT

* Type: string
* Default: not set

Protocol format to integrate IDEs with stack trace file links. You can provide your custom format or use one of the supported formats: "phpstorm", "idea", "sublime", "textmate", "emacs" or "macvim"

_Note: if you use your custom format remember to escape the string for use in "sed" command_

#### OPcache

###### OPCACHE_VALIDATE_TIMESTAMP

* Type: int
* Default: 1

Disable file timestamp validation by setting to 0

###### OPCACHE_MEMORY_CONSUMPTION

* Type: int
* Default: 128

Memory consumption limit in megabytes

###### OPCACHE_MAX_ACCELERATED_FILES

* Type: int
* Default: 1000

Max number of in-memory cached files

## Volumes

#### /app

The default working directory. You should mount your project root path in this volume

#### /var/log/php

Logging volume for PHP logs (PHP-FPM too) and Xdebug's log, profile and trace files

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

### Using Xdebug

It is **not recommended** to have a fixed remote session identifier and/or an auto-started remote session using "XDEBUG_IDE_KEY" and "XDEBUG_REMOTE_AUTOSTART" environment variables respectively

The preferred way of starting a remote debug session is by setting remote session identifier dynamically by one of the following means:

* By setting "XDEBUG_SESSION" cookie with the session identifier as its value. eg: `curl -b "XDEBUG_SESSION=session-identifier" http://example.local/`
* On HTTP request by adding "XDEBUG_SESSION_START" query parameter to the URI.  eg: `curl http://example.local?XDEBUG_SESSION_START=session-identifier`
* On POST requests by adding a "XDEBUG_SESSION_START" parameter. eg: `curl -X POST -F "XDEBUG_SESSION_START=session-identifier" http://example.local`

##### Xdebug profiler

To activate the profiler set "XDEBUG_PROFILE" cookie. `cachegrind.out.*` files will be saved into `/var/log/php` directory

##### Xdebug trace

To activate the trace set "XDEBUG_TRACE" cookie. `xdebug_trace.*.xt` files will be saved into `/var/log/php` directory

#### Browser support

There are [browser plugins/extensions](https://xdebug.org/docs/remote#starting) available to very easily toggle these cookies

#### Debugging with PHPStorm

##### Review Xdebug configuration

![Xdebug configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_xdebug_config.jpg)

* Port must be the same previously defined in `XDEBUG_REMOTE_PORT` environment variable
* If you're using any of juliangut/phpdev:fpm* versions remember that **port 9000 is already in use by PHP-FPM itself, use port 9001 instead**, or any other you please

##### Create a server

![server configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_server_config.jpg)

* Server name will be used later so make it stand out
* Host and port must be the same set in the built-in server. You can use "0.0.0.0" to allow any host
* Map your project root to container location (/app)

##### Start listening for Xdebug connections

![start listening](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_debug_listen.jpg)

Start listening for incoming connections by toggling _Run > Start Listening for PHP Debug Connections_, or by clicking the phone icon, and finally create a breakpoint

##### Start the container

Setting `PHP_IDE_CONFIG` environment variable to the server name you defined earlier

```bash
docker run -d -p 8080:8080 -e PHP_IDE_CONFIG="serverName=Test" -e XDEBUG_FILE_LINK_FORMAT=phpstorm -v `pwd`:/app juliangut/phpdev:latest php -S 0.0.0.0:8080 -t /app/public
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
      PHP_IDE_CONFIG: serverName=Test
    volumes:
      - .:/app
    command: "php -S 0.0.0.0:8080 -t /app/public"
```

#### Firewalld & NetworkManager notice

By default, firewalld blocks all outgoing connections from docker containers, such as Xdebug connection to port 9000 on the host. In order to allow docker containers to connect with Xdebug server you need to include `docker0` interface into a "trusted" zone both on NetworkManager and firewalld:

Assign docker0 interface to "trusted" zone and stop NetworkManager service
```
nmcli connection modify docker0 connection.zone trusted
systemctl stop NetworkManager.service
```

Assign "trusted" zone for docker0 interface on firewalld. Additionally 172.0.0.0/8 source is added to cover any created docker network

```
firewall-cmd --permanent --zone=trusted --change-interface=docker0
firewall-cmd --permanent --zone=trusted --add-source=172.0.0.0/8
firewall-cmd --reload
```

Restart NetworkManager and reassign docker0 interface just in case
```
systemctl start NetworkManager.service
nmcli connection modify docker0 connection.zone trusted
```

Restart docker service, so it recreates its iptables
```
systemctl restart docker.service
```

## Extending the image

The image comes with just the minimum PHP extensions, you will most probably need more

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
  && pickle install \ # use pecl install in PHP < 8.0
    apcu \
    redis \
  && docker-php-ext-enable \
    apcu \
    redis \
  \
  && apk del .build-deps \
  && rm -rf /tmp/* /var/cache/apk/* /usr/share/php

# Add global composer dependencies as 'docker' user
USER docker
RUN composer global require phpunit/phpunit

# You should always return to user 'root'
USER root
```

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/event-sourcing/issues). Have a look at existing issues before

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms
