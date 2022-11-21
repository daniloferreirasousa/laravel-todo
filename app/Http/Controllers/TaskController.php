<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index(Request $r) {
       
    }

    public function create(Request $r) {

        $categories = Category::all();
        $data = ['categories' => $categories];

        return view('tasks/create', $data);
    }

    public function create_action(Request $r) {
        $task = $r->only(['title', 'category_id', 'due_date', 'description']);
        $task['user_id'] = 1;

        $dbTask = Task::create($task);
        return redirect(route('home'));
    }


    public function edit(Request $r) {
        $id = $r->id;

        $task = Task::find($id);

        if(!$task) {
            return redirect(route('home'));
        }
        $categories = Category::all();
        $data = ['categories' => $categories];

        $data['task'] = $task;

        return view('tasks/edit', $data);
    }

    public function edit_action(Request $r) {
        $data_request = $r->only(['title', 'due_date', 'category_id', 'description']);
        $data_request['is_done'] = $r->is_done ? true : false;

        $task = Task::find($r->id);

        if(!$task) {
            return 'Error de Task não existente';
        }

        $task->update($data_request);
        $task->save();
        
        return redirect(route('home'));
    }
    
    public function delete(Request $r) {
        $id = $r->id;

        $task = Task::find($id);

        if($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }

    public function update(Request $r) {
        $task = Task::findOrFail($r->idTask);
        $task->is_done = $r->status;
        $task->save();
        return ['success' => true];
    }
}
