FROM php:8.2.0-fpm

RUN apt-get update && apt-get install -y \
      git \
      libicu-dev \
      libpq-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) pdo_mysql

RUN ln -sf /usr/share/zoneinfo/Asia/Bangkok /etc/localtime

WORKDIR /var/www

RUN cd /var/www
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

RUN curl -sS https://get.symfony.com/cli/installer | bash
# make symfony command available globally
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

EXPOSE 9000
CMD ["php-fpm"]