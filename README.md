# Laravel News Catalog

Проект на Laravel для управления новостями с категориями и авторами.

## Стек технологий

- PHP 8.2
- Laravel 12
- MySQL / MariaDB
- Composer

## Установка

1. Клонировать репозиторий:

```bash
git clone https://github.com/melsash/news_catalog.git
cd news_catalog

2.Установить зависимости:

composer install

3.Создать .env файл  и настроить базу данных:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news_catalog
DB_USERNAME=root
DB_PASSWORD=

4.Запустить миграции и заполнить базу начальными данными:php artisan migrate:fresh --seed

5.Очистить кэш Laravel: php artisan optimize:clear


Использование

API маршруты для работы с новостями:

Метод	URL	Описание
GET	/api/news	Получить все новости
GET	/api/news/{id}	Получить конкретную новость
POST	/api/news	Создать новость
PUT	/api/news/{id}	Обновить новость
DELETE	/api/news/{id}	Удалить новость
Структура проекта

app/ — контроллеры и модели

database/ — миграции и сидеры

routes/ — маршруты

resources/ — Blade-шаблоны

public/ — публичные файлы

tests/ — тесты

Сидеры

Содержит сидеры для:

Авторов (AuthorSeeder)

Категорий (CategorySeeder)

Новостей (NewsSeeder)

Лицензия

MIT License: sql
