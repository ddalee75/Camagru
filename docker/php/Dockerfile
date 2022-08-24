FROM php:7.4-fpm

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libjpeg62-turbo-dev libgd-dev zip msmtp msmtp-mta bsd-mailx\
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd

WORKDIR /var/www/projet
RUN chown www-data:www-data /var/www/projet
RUN mkdir -p /var/www/projet/common/gallery
RUN chown www-data /var/www/projet/common/gallery


# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer