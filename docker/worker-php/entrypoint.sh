#!/bin/bash

function run {
  php-fpm
}

function install {
  composer install -d /var/www/html
}

if [ ! -d '/var/www/html/vendor' ]
then
  install
fi

run
