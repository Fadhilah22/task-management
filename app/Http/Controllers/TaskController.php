<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Task::all();

        return view("task.index",compact("Tasks"));
    }

    public function create(){
        return view("task.create");
    }

    public function store(Request $request){
        // title | description | status | priority | due_date | project_id | created_by | assigned_to | created_at | updated_at

        $taskData = $this->$request->validate([
            "title" => "required|string|max:255|",
            "description" => "string",
            "status" => "integer",
            "priority" => "enum",
            "due_date" => "date",
        ]);

        Task::create($taskData);

        return view('task.store', compact('Task'));
    }

    public function show(Task $task){
        return view('task.show', compact('Task'));
    }

    public function edit(Task $task){
        return view('task.edit', compact('Task'));
    }

    public function update(Request $request, Task $task){
        $updatedData = $request->validate([
            "title" => "string|max:255|",
            "description" => "string",
            "status" => "integer",
            "priority" => "enum",
            "due_date" => "date",
        ]);

        Task::update($updatedData);

        return view('task.update', compact('Task'));
    }
}