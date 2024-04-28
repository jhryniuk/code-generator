#!/bin/bash

function install {
  composer install -d /var/www/html  install
  php /var/www/html/bin/console doctrine:migration:migrate -q
}

function run {
  php-fpm
}

if [ ! -d '/var/www/html/vendor' ];
then
  install
fi

run
