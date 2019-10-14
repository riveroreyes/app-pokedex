FROM php:apache
RUN apt-get update \
    && apt-get install -y librabbitmq-dev libssh-dev git libzip-dev zip unzip libxml2-dev \
        htop procps sendmail libpng-dev nano \
    && pecl install amqp

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

ENV php_ini /usr/local/etc/php/php.ini

RUN docker-php-ext-install opcache bcmath sockets \
    && docker-php-ext-enable amqp \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install soap \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli

