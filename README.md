# docker compose configuration for PHP, mginx, PHP-FPM, MySQL, PostgreSQL, Composer and Symfony

> Docker Compose configuration to run PHP, mginx, PHP-FPM, MySQL, PostgreSQL, Composer and Symfony

- PHP 8.2.0
- nginx 1.18
- MySQL 8.0.23
- PostgreSQL 13.1

## Overview

This Docker Compose configuration allows you to run PHP 7.4 with nginx 1.18, PHP-FPM, MySQL 8.0.23, PostgreSQL 13.1, Composer and Symfony.

It exposes 4 services:

- nginx
- php-fpm
- mysql
- postgres

To know all extensions enabled for PHP you can run it using `docker-compose up` and visit: http://localhost/ and check the PHP info.

PHP has by default **pdo_mysql**, **pdo_pgsql** and **Xdebug** enabled.

The UUID extension for PostgreSQL has been added.

Nginx includes default basic configuration for Symfony 5.

Composer runs during boot to install the vendors. More info: https://getcomposer.org

Symfony command is available. More info: https://symfony.com/download


## Prerequisites

You must have docker running on your computer. Follow the installation instructions from here:

https://docs.docker.com/desktop/


## How to use it

### Start docker compose

Checkout this repo or download it.

Just run `docker-compose up`

By default nginx will be available on `http://localhost:80`, PostgreSQL on `http://localhost:5432` and MySQL on `http://localhost:3306`

### Use nginx

You can run some nginx commands when needed, i.e.:

`docker-compose exec nginx nginx -v`

### Use Composer

You can run composer commands, i.e.:

`docker-compose run composer <composer-command>`

`docker-compose run composer -V`

### Use Symfony

You can run symfony commands, i.e.:

`docker-compose exec php-fpm symfony <symfony-command>`

For instance, you can check symfony requirements:

`docker-compose exec php-fpm symfony check:req`

### Use PHP

You can run PHP commands, i.e.:

`docker-compose exec php-fpm php -v`

### Use PostgreSQL

You can run postgres commands, i.e.:

`docker-compose exec postgres postgres -V`

And work with your DBs:

`docker-compose exec postgres psql -d testdb -U myuser`

### Use MySQL

You can run mysql commands, i.e.:

`docker-compose exec mysql mysql -V`

And work with your DBs:

`docker-compose exec mysql mysql -u root -pmyrootpassword`



## Configuration

### Configuring volumes

By default when you run `docker-compose up` it's attaching the `src/` folder as volume. It will be the folder used to serve the source code.

Check `docker-compose.yml` and change the volumes for nginx and php-fpm where you have your code.

You can change `./src/` under `volumes:` to any other folder in your system.

```
volumes:
  - ./src/:/var/www/
```

For instance:

```
volumes:
  - ../my-symfony-project/:/var/www/
```

### Configuring DBs

The `docker-compose.yml` runs both MySQL and PostgreSQL but if you want to use only one you can comment the code out (or delete it) the DB you don't want to use in `docker-compose.yml` file.

The `.env` file contains the sensitive user & password information for connecting to the DBs.

Modify `.env` file default parameters according to your needs.

### Configuring PHP

You can enable/disable any PHP directive just by editing these files:

`./php-fpm/conf.d/php.ini` or `./php-fpm/conf.d/xdebug.ini`

