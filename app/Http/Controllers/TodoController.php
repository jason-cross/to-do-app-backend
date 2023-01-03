<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //GET {{base_url}}/todos
    public function index() {
        return 'displays all';
    }

    //GET {{base_url}}/todo/:id
    public function create() {
        return 'displays single todo';
    }

    //POST {{base_url}}/todo
    public function store() {
        return 'saves to database';
    }

    //PATCH {{base_url}}/todo/:id
    public function update() {
        return 'updates todo';
    }

    //DELETE {{base_url}}/todo/:id
    public function destroy() {
        return 'removes from database';
    }
}
