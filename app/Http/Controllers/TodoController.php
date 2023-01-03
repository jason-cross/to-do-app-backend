<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //GET {{base_url}}/todos
    public function index() {
        return Todo::all();
    }

    //GET {{base_url}}/todo/:id
    public function create(Todo $id) {
        return $id;
    }

    //POST {{base_url}}/todo
    public function store() {
        return Todo::create([
            'name' => request('name'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'is_complete' => request('is_complete')
        ]);
    }

    //PATCH {{base_url}}/todo/:id
    public function update(Todo $id) {
        $id->update([
            'name' => request('name'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'is_complete' => request('is_complete')
        ]);

        return $id;
    }

    //DELETE {{base_url}}/todo/:id
    public function destroy(Todo $id) {
        $id->delete();
        
        return $id;
    }
}
