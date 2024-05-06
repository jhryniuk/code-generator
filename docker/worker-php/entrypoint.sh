#!/bin/bash

function run {
  /var/www/html/bin/console messenger:consume async
}

function install {
  composer install -d /var/www/html
}

if [ ! -d '/var/www/html/vendor' ]
then
  install
fi

run
