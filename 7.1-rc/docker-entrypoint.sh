#!/bin/bash

set -e

# if command starts with an option, prepend php
if [ "${1:0:1}" = '-' ]; then
  set -- php "$@"
fi

if [ ! -f /var/log/php/xdebug.log ]; then
  touch /var/log/php/xdebug.log
  chmod 666 /var/log/php/xdebug.log
fi

HOST_IP=`ip route | awk '/default/ { print $3 }'`
sed -i "s/xdebug.remote_host\s*=.*/xdebug.remote_host = ${HOST_IP}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini

if [ ! -z "${XDEBUG_REMOTE_AUTOSTART}" ]; then
  sed -i "s/xdebug.remote_autostart\s*=.*/xdebug.remote_autostart = ${XDEBUG_REMOTE_AUTOSTART}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_CONNECT_BACK}" ]; then
  sed -i "s/xdebug.remote_connect_back\s*=.*/xdebug.remote_connect_back = ${XDEBUG_REMOTE_CONNECT_BACK}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_PORT}" ]; then
  sed -i "s/xdebug.remote_port\s*=.*/xdebug.remote_port = ${XDEBUG_REMOTE_PORT}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini
fi

if [ ! -z "${XDEBUG_REMOTE_HOST}" ]; then
  sed -i "s/xdebug.remote_host\s*=.*/xdebug.remote_host = ${XDEBUG_REMOTE_HOST}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini
fi

if [ ! -z "${XDEBUG_IDE_KEY}" ]; then
  sed -i "s/;\?xdebug.idekey\s*=.*/xdebug.idekey = ${XDEBUG_IDE_KEY}/" $PHP_INI_DIR/conf.d/zz-xdebug.ini
fi

exec "$@"
