#!/bin/bash

# Если команда с ошибкой - стоп
set -e

echo "Deployment started ..."

# Войти в режим обслуживания или вернуть true
# если уже в режиме обслуживания
(php artisan down) || true

# Загрузить последнюю версию приложения
git pull origin main

# Установить зависимости Composer
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Очистить старый кэш
php artisan clear-compiled

# Запустить миграцию базы данных
php artisan migrate --force

# Пересоздать кэш
# config, events, routes, views
php artisan optimize

# Скомпилировать ресурсы
npm run build

# Выход из режима обслуживания
php artisan up

echo "Deployment finished!"
