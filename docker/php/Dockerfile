FROM php:8.1-fpm

RUN apt-get update -qq && apt-get install -y git \
    curl \
    perl \
    zip

RUN docker-php-ext-install \
    mysqli \
    pdo_mysql \
    opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -r /var/lib/apt/lists/*
