#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
apt-get update -yqq
apt-get install git wget curl zlib1g-dev -yqq

# Install phpunit, the tool that we will use for testing
curl --location --output /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-7.phar
chmod +x /usr/local/bin/phpunit

# Install mysql driver
# Here you can install any other extension that you need
# docker-php-ext-install pdo_mysql

# Enable Xdebug