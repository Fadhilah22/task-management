<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        $projects = Project::all();

        return view("project.index",compact("projects"));
    }

    public function create(){
        return view("project.create");
    }

    public function store(Request $request){
        //  id | title | description | status | priority | start_date | end_date | create_at | updated_at | created_by

        $projectData = $this->$request->validate([
            "title" => "required|string|max:255|",
            "description"=> "string",
            "status"=> "integer",
            "start_date"=> "date",
            "end_date"=>"date",
        ]);

        Project::create($projectData);

        return view('project.store', compact('project'));
    }

    public function show(Project $project){
        return view('project.show', compact('project'));
    }

    public function edit(Project $project){
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project){
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'description'=> 'string',
            'status'=> 'integer',
            'start_date'=> 'date',
            'end_date'=> 'date',
        ]);
    }
}
