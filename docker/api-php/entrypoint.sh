#!/bin/bash

function install {
  composer install -d /var/www/html
  /var/www/html/bin/console doc:mig:mig -q
}

function run {
  php-fpm
}

if [ ! -d '/var/www/html/vendor' ];
then
  install
fi

run
