<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Routes
### Создание задачи:
```js
async function createTask() {
    const request = new Request("/api/tasks", {
        method: "POST",
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
        method: "GET"
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
        method: "GET"
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
        method: "DELETE"
    });

    const response = await fetch(request);
    const result = await response.json()
    console.log(result);
}
```
