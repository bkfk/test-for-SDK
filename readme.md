<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Docker & Docker-Compose

Делалось на docker-compose version 1.21.2, build a133471, Ubuntu 16.04. Пользователь добавлен в группу docker, что позволяет выполнять команды докера без sudo.

Установка:

git clone https://github.com/bkfk/test-for-SDK.git test-docker

cd test-docker

cp ./.env.example ./.env

docker-compose up -d

composer install

docker-compose exec app php artisan migrate

Открываем в браузере адрес http://0.0.0.0:8080/
