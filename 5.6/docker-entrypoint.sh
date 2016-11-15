#!/bin/bash

set -e

# if command starts with an option, prepend php-fpm
if [ "${1:0:1}" = '-' ]; then
  set -- php-fpm "$@"
fi

if [ ! -z "${XDEBUG_REMOTE_AUTOSTART}" ]; then
  sed -i "s/xdebug.remote_autostart\s*=.*/xdebug.remote_autostart=${XDEBUG_REMOTE_AUTOSTART}/" $PHP_INI_DIR/conf.d/xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_CONNECT_BACK}" ]; then
sed -i "s/xdebug.remote_connect_back\s*=.*/xdebug.remote_connect_back=${XDEBUG_REMOTE_CONNECT_BACK}/" $PHP_INI_DIR/conf.d/xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_PORT}" ]; then
sed -i "s/xdebug.remote_port\s*=.*/xdebug.remote_port=${XDEBUG_REMOTE_PORT}/" $PHP_INI_DIR/conf.d/xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_HOST}" ]; then
sed -i "s/xdebug.remote_host\s*=.*/xdebug.remote_host=${XDEBUG_REMOTE_HOST}/" $PHP_INI_DIR/conf.d/xdebug.ini
fi

if [ ! -z "${XDEBUG_IDE_KEY}" ]; then
sed -i "s/xdebug.idekey\s*=.*/xdebug.idekey=${XDEBUG_IDE_KEY}/" $PHP_INI_DIR/conf.d/xdebug.ini
fi

exec "$@"
