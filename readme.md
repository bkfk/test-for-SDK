## Тестовое задание

Делалось на Laravel Framework 5.7.29, docker-compose version 1.21.2, Ubuntu 16.04. Пользователь добавлен в группу docker, что позволяет выполнять команды докера без sudo.

Развертывание для проверки:

git clone https://github.com/bkfk/test-for-SDK.git test-project

cd test-project

cp ./.env.example ./.env

docker-compose up -d

composer install

docker-compose exec app php artisan migrate

Открываем в браузере адрес http://0.0.0.0:8080/
