<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Todo;

class TodoController extends Controller
{
    //Returns all entries in the list
    public function index() {
        return [
            'todo' => Todo::all(),
            'success' => true,
            'error' => null
        ];
    }

    //Returns an entry in the list by a given ID
    public function create($id) {
        return $this->checkTodoExists($id);
    }

    //Adds an entry into the list
    public function store() {
        //Check that the request body contains all the required fields
        $response = $this->validateRequestBody(request());

        //If successful, add entry to database
        if ($response['success']) {
            $response['todo'] = Todo::create([
                'name' => request('name'),
                'description' => request('description'),
                'due_date' => request('due_date'),
                'is_complete' => request('is_complete')
            ]);
        }

        //Return newly entered item
        return $response;
    }

    //Updates an entry in the list
    public function update($id) {
        //Check that entry to be updated exists
        $search = $this->checkTodoExists($id);

        //Check that request body contains all the required data
        $response = $this->validateRequestBody(request());

        //If both successful, update entry in database
        if($search['success']) {
            if ($response['success']) {
                $search['todo']->update([
                    'name' => request('name'),
                    'description' => request('description'),
                    'due_date' => request('due_date'),
                    'is_complete' => request('is_complete')
                ]);
                $response['todo'] = $search['todo'];
            }
        } else {
            //Since checking item exists is performed first, set the return
            //value to include the original error message
            $response = $search;
        }

        //Return updated entry
        return $response;
    }

    //Deletes an entry from the list
    public function destroy($id) {
        //Check that entry to be deleted exists
        $search = $this->checkTodoExists($id);

        //If successful, delete entry
        if($search['success']) {
            $search['todo']->delete();
        }

        //Return deleted entry
        return $search;
    }

    //Validators

    //Checks if there is an entry at the given ID, sets a success boolean and an
    //error message if necessary
    private function checkTodoExists($id) {
        $todo = Todo::find($id);
        return [
            'todo' => $todo,
            'success' => ($todo) ? true : false,
            'error' => ($todo) ? null : 'Todo not found'
        ];
    }

    //Checks if the request body contains all the required data, sets a success
    //boolean and an error message if necessary
    private function validateRequestBody($request) {
        try {
            request()->validate([
                'name' => 'required',
                'description' => 'required',
                'due_date' => 'required',
                'is_complete' => 'required',
            ]);
            $response = [
                'todo' => '',
                'success' => true,
                'error' => null
            ];
        } catch (ValidationException $e) {
            $response = [
                'todo' => '',
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return $response;
    }
}
