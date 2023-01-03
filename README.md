-------------------
STARTUP INFORMATION
-------------------
Run app with command './vendor/bin/sail up;' from within the /to-do-app directory
The app will run from inside a docker container using an SQLite database that also runs inside the container
The app is backend only so must be interfaced through Postman
The base url the server is located at is 'localhost/'

--------------
FILE STRUCTURE
--------------
All files included from creation of project are still present
Relevant files for this app can be found in the following places:
Routes: /app/routes/api.php
Controller: /app/Http/Controllers/TodoController.php
Model: /app/Models/Todo.php
Schema: /database/migrations/2023_01_03_071023_create_todos_table.php

-----------------------
AVAILABLE FUNCTIONALITY
-----------------------
Get Todo
GET localhost/todo/:id

List Todo's
GET localhost/todos

Add Todo
POST localhost/todo
Requires body in the form: 
{
    "name": "",
    "description": "",
    "due_date": "",
    "is_complete": false
}

Edit Todo
PATCH localhost/todo/:id
Requires body in the form: 
{
    "name": "",
    "description": "",
    "due_date": "",
    "is_complete": false
}

Delete Todo
DELETE localhost/todo/:id

Error handling has been put into place to ensure both that the entry exists for Get Todo, Edit Todo and Delete Todo features, 
as well as that the request body contains all the required fields for Add Todo and Edit Todo features