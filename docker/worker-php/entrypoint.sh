#!/bin/bash

function run {
  php-fpm
}

function install {
  composer -d /var/www/html install
}

if [ ! -d '/var/www/html/vendor' ]
then
  install
fi

run
