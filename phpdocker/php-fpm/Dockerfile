FROM php:8.1.6-fpm

WORKDIR "/assessment-backend-xp"

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.1.5 \
    && docker-php-ext-enable memcached

RUN apt-get install zip unzip \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && unlink composer-setup.php

# RUN composer install --ignore-platform-reqs

# Run migrations
# RUN phinx migrate -e development

# Run seed
# RUN phinx seed:run -s ProductSeeder -s CategorySeeder -s ProductCategoryMappingSeeder