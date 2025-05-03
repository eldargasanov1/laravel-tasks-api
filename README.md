<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Запуск с помощью Laravel Sail
```shell
# Клонирование проекта
mkdir tasks
cd tasks

git init
git remote add origin https://github.com/eldargasanov1/laravel-tasks-api.git
git pull origin main

# Установка и запуск Laravel Sail
composer require laravel/sail --dev
cp .env.example .env
php artisan sail:install -> Enter
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan make:main-user > Скопируйте токен из терминала
./vendor/bin/sail artisan db:seed

# Приложение запущено по адресу http://127.0.0.1/

# Готово!
```
## Routes
Перед выполнением запроса необходимо в **_headers_** указать полученный **_токен авторизации_**.
### Создание задачи:
```js
async function createTask() {
    const request = new Request("/api/tasks", {
        method: "POST",
        headers: {
            'Authorization': 'Bearer <token>'
        },
        body: JSON.stringify({
            "title": "Task title",
            "description": "Task description"
        })
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
### Просмотр списка задач:
```js
async function getTasks() {
    const request = new Request("/api/tasks", {
        method: "GET",
        headers: {
            'Authorization': 'Bearer <token>'
        },
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
### Просмотр одной задачи:
```js
async function getTask(task_id) {
    const request = new Request(`/api/tasks/${task_id}`, {
        method: "GET",
        headers: {
            'Authorization': 'Bearer <token>'
        },
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
### Обновление задачи:
```js
async function updateTask(task_id) {
    const request = new Request(`/api/tasks/${task_id}`, {
        method: "PATCH",
        headers: {
            'Authorization': 'Bearer <token>'
        },
        body: JSON.stringify({
            "title": "Task title | New",
            "description": "Task description | New"
        })
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
### Удаление задачи:
```js
async function deleteTask(task_id) {
    const request = new Request(`/api/tasks/${task_id}`, {
        method: "DELETE",
        headers: {
            'Authorization': 'Bearer <token>'
        },
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
