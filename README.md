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

_Defaults to "On"_

Auto start remote debugging.

#### XDEBUG_REMOTE_CONNECT_BACK

_Defaults to "Off"_

Auto connect with requesting server.

#### XDEBUG_REMOTE_PORT

_Defaults to 9000_

Remote server port to connect to, IDE should be listening on this port.

#### XDEBUG_REMOTE_HOST

_Defaults to 127.0.0.1_

Remote server IP to connect to. Not used if `XDEBUG_REMOTE_CONNECT_BACK` is activated.

#### XDEBUG_IDE_KEY

_Defaults to PHPSTORM_

Remote session identifier.

## Volumes

#### /app

`/app` volume is the default working directory. You should mount your project root path in this volume. 

## Getting image

```bash
docker pull juliangut/phpdev:latest
```

## Running a container

```bash
docker run -it -v $(pwd):/app juliangut/phpdev:latest
```

### Running built-in server in a container

Access running server on `http://localhost:9000`

```bash
docker run -d -p 9000:9000 -v $(pwd):/app juliangut/phpdev:latest php -S 0.0.0.0:9000
```

#### With Docker Compose
 
```yaml
# docker-compose.yml
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

## Extend container

```
# Dockerfile
FROM juliangut/phpdev:latest


```

## License

See file [LICENSE](https://github.com/juliangut/docker-phpdev/blob/master/LICENSE) included with the source code for a copy of the license terms.
