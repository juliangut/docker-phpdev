[![Docker Stats](http://dockeri.co/image/juliangut/phpdev)](https://hub.docker.com/r/juliangut/phpdev/)

[![Docker Build Statu](https://img.shields.io/docker/build/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/)
[![Docker Automated build](https://img.shields.io/docker/automated/juliangut/phpdev.svg?style=flat-square)](https://hub.docker.com/r/juliangut/phpdev/builds/)

# PHP development Docker image

PHP/PHP-FPM/Jenkins Docker image for development/CI, based on Alpine Linux for minimal size

Bundled with:

* UTC timezone
* Latest stable [Xdebug](https://xdebug.org/), configured and enabled for remote debugging
* [Composer](https://getcomposer.org/) installed globally
* Additionally installed PHP extensions:
  * [Multibyte String](http://php.net/manual/en/book.mbstring.php)
  * [cURL](http://php.net/manual/en/book.curl.php)
  * [OpenSSL](http://php.net/manual/en/book.openssl.php)
  * [Zlib](http://php.net/manual/en/book.zlib.php)
  * [BCMath](http://php.net/manual/en/book.bc.php)
  * [GD](http://php.net/manual/en/book.image.php)
  * [OPcache](http://php.net/manual/en/book.opcache.php)

## Available tags

#### CLI

|        |            |                                                                                              |                                                                                                                                                |
|--------|------------|----------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------|
| latest | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2.svg)](https://microbadger.com/images/juliangut/phpdev:latest) |
| cli    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2.svg)](https://microbadger.com/images/juliangut/phpdev:cli)    |
| 7      | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2.svg)](https://microbadger.com/images/juliangut/phpdev:7)      |
| 7.3    | PHP 7.3-rc | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.3/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.3.svg)](https://microbadger.com/images/juliangut/phpdev:7.3)    |
| 7.2    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2.svg)](https://microbadger.com/images/juliangut/phpdev:7.2)    |
| 7.1    | PHP 7.1    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.1/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.1.svg)](https://microbadger.com/images/juliangut/phpdev:7.1)    |
| 7.0    | PHP 7.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/7.0/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.0.svg)](https://microbadger.com/images/juliangut/phpdev:7.0)    |
| 5      | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6.svg)](https://microbadger.com/images/juliangut/phpdev:5)      |
| 5.6    | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/php/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6.svg)](https://microbadger.com/images/juliangut/phpdev:5.6)    |

#### FPM

|            |            |                                                                                              |                                                                                                                                                               |
|------------|------------|----------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|
| fpm-latest | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:fpm-latest.svg)](https://microbadger.com/images/juliangut/phpdev:fpm-latest) |
| fpm        | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:fpm)               |
| 7-fpm      | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:7-fpm)             |
| 7.3-fpm    | PHP 7.3-rc | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.3/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.3-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:7.3-fpm)           |
| 7.2-fpm    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:7.2-fpm)           |
| 7.1-fpm    | PHP 7.1    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.1/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.1-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:7.1-fpm)           |
| 7.0-fpm    | PHP 7.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/7.0/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.0-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:7.0-fpm)           |
| 5-fpm      | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:5-fpm)             |
| 5.6-fpm    | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/fpm/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6-fpm.svg)](https://microbadger.com/images/juliangut/phpdev:5.6-fpm)           |

#### Jenkins

|                |            |                                                                                                  |                                                                                                                                                                       |
|----------------|------------|--------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| jenkins-latest | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:jenkins-latest.svg)](https://microbadger.com/images/juliangut/phpdev:jenkins-latest) |
| jenkins        | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:jenkins)               |
| 7-jenkins      | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:7-jenkins)             |
| 7.3-jenkins    | PHP 7.3-rc | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.3/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.3-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:7.3-jenkins)           |
| 7.2-jenkins    | PHP 7.2    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.2/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.2-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:7.2-jenkins)           |
| 7.1-jenkins    | PHP 7.1    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.1/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.1-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:7.1-jenkins)           |
| 7.0-jenkins    | PHP 7.0    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/7.0/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:7.0-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:7.0-jenkins)           |
| 5-jenkins      | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:5-jenkins)             |
| 5.6-jenkins    | PHP 5.6    | [Dockerfile](https://github.com/juliangut/docker-phpdev/blob/master/dist/jenkins/5.6/Dockerfile) | [![Docker Size](https://images.microbadger.com/badges/image/juliangut/phpdev:5.6-jenkins.svg)](https://microbadger.com/images/juliangut/phpdev:5.6-jenkins)           |

Jenkins version is specially designed to be run as a Jenkins slave on a CI pipeline

### Important support notice!

PHP 5.6 and PHP 7.0 will reach end of life during December 2018, all tags related with this versions of PHP will be removed at the end of January 2019. Start migration to newer versions as soon as possible

## Environment variables

#### USER_UID

* **For FPM and Jenkins versions**
* Type: int
* Default: not set
* _Recommended_

In order to avoid file access problems it is recommended to set this variable to your user's UID. You can find your UID by running `id -u`

#### USER_GID

* **For FPM and Jenkins versions**
* Type: int
* Default: not set
* _Recommended_

In order to avoid file access problems it is recommended to set this variable to your user's GID. You can find your GID by running `id -g`

#### XDEBUG_DISABLE

* Type: int
* Default: 0

Disable Xdebug by setting a non zero value

#### XDEBUG_REMOTE_HOST

* Type: string
* Default: auto discovered host's ip

Remote server (host) IP to connect to

#### XDEBUG_REMOTE_PORT

* Type: integer
* Default: 9000

Remote server port to connect to, IDE should be listening on this port

#### XDEBUG_REMOTE_AUTOSTART

* Type: integer
* Default: 0
* _Not recommended_

Auto start remote debugging

#### XDEBUG_IDE_KEY

* Type: string
* Default: not set
* _Not recommended_

Fixed remote session identifier

_Note: escape the string for use in sed_

#### XDEBUG_FILE_LINK_FORMAT

* Type: string
* Default: not set

Protocol format to integrate IDEs with stack trace file links. You can provide your custom format or use one of the supported formats: "phpstorm", "idea", "sublime", "textmate", "emacs" or "macvim"

_Note: if you use your custom format remember to escape the string for use in "sed" command_

## Volumes

#### /app

The default working directory. You should mount your project root path in this volume.

#### /var/log/php

Logging volume for PHP and PHP-FPM logs and Xdebug log, profile and trace files.

## Usage

### Getting the image

```bash
docker pull juliangut/phpdev:latest

docker pull juliangut/phpdev:fpm-latest

docker pull juliangut/phpdev:jenkins-latest
```

### Running a container

```bash
docker run -it --rm -v `pwd`:/app juliangut/phpdev:latest

docker run -d -e USER_UID=`id -u` -e USER_GID=`id -g` -v `pwd`:/app juliangut/phpdev:fpm-latest
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

In order to run a composer command you should provide docker with your user/group info, otherwise files resulting from composer command won't have your (correct) permissions

```bash
docker run --rm -u `id -u`:`id -g` -v `pwd`:/app juliangut/phpdev:latest composer [command]

docker run --rm -u `id -u`:`id -g` -v `pwd`:/app juliangut/phpdev:fpm-latest composer [command]
```

#### Accessing a running container

```bash
docker exec -it [container_id] /bin/bash
```

### Using Xdebug

It is **not recommended** to have a fixed remote session identifier and/or an auto-started remote session using "XDEBUG_IDE_KEY" and "XDEBUG_REMOTE_AUTOSTART" environment variables respectively.

The preferred way of starting a remote debug session is by setting remote session identifier dynamically by one of the following means:

* On browser by setting "XDEBUG_SESSION" cookie with the session identifier as its value
* On HTTP request (cURL) by adding "XDEBUG_SESSION_START" parameter to the URI or as a POST parameter. eg: `curl -X POST -F "XDEBUG_SESSION_START=PHPSTORM" http://example.local`

##### Xdebug profiler

To activate the profiler set "XDEBUG_PROFILE" cookie. Profile `cachegrind.out.*` files will be saved into `/var/log/php` directory

##### Xdebug trace

To activate the trace set "XDEBUG_TRACE" cookie. Trace `*.xt` files will be saved into `/var/log/php` directory

#### Browser support

There are [browser plugins/extensions](https://xdebug.org/docs/remote#starting) to toggle these debug cookies easily

#### Debugging with PHPStorm

##### Review Xdebug configuration

![Xdebug configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_xdebug_config.jpg)

* Port must be the same previously defined in `XDEBUG_REMOTE_PORT` environment variable
* If you're using any of juliangut/pphpdev:fpm* versions remember that **port 9000 has already been taken by PHP-FPM, use 9001** or any other you please instead

##### Create a server

![server configuration](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_server_config.jpg)

* Server name will be used later so make it stand out
* Host and port must be the same set in built-in server. You you can use "0.0.0.0" to allow any host
* Map your project root to container location (/app)

##### Start listening for Xdebug connections

Click the phone icon to start listening for incoming connections and create a breakpoint

![start listening](https://raw.githubusercontent.com/juliangut/docker-phpdev/master/img_debug_listen.jpg)

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
      XDEBUG_FILE_LINK_FORMAT: phpstorm
    volumes:
      - .:/app
    command: "php -S 0.0.0.0:8080 -t /app/public"
```

#### Firewalld & NetworkManager notice

By default firewalld blocks all outgoing connections from docker containers, such as Xdebug connection to port 9000 on host. In order to allow docker containers to connect with Xdebug server you need to include `docker0` interface into a "trusted" zone both on NetworkManager and firewalld:

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

Restart docker service so it recreates its iptables
```
systemctl restart docker.service
```

## Extending the image

The image comes with just the minimum PHP extensions, you most probably will need more.

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
  \
  && composer global require phpunit/phpunit
```

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms.
