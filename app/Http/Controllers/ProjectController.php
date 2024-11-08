<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view("project.index",compact("projects"));
    }

    public function create(){
        return view("project.create");
    }

    public function store(Request $request){
        //  id | title | description | status | priority | start_date | end_date | create_at | updated_at | created_by
        info('project.store called');
        try{
            $projectData = $request->validate([
                "title" => "required|string|max:255|",
                "description" => "string",
                "status" => "string|max:30",
                "priority" => "integer",
                "start_date" => "date",
                "end_date" =>"date",
                "created_by" => "string"
            ]);

            $this->debugProjectInput($projectData);

            Project::create($projectData);

        } catch(ValidationException $e){
            info($e->getMessage());
        }
        return redirect('/')->with("success", "project ". $projectData["title"] . " created!");
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
            'status'=>'string|max:30' ,
            'start_date'=> 'date',
            'end_date'=> 'date',
        ]);
    }

    public function showCreate(){
        return view('project.create');
    }

    private function debugProjectInput($projectData){
        info("LOG ProjectController : "
            . $projectData['title'] . " "
            . $projectData['description']. " "
            . $projectData['status'] . " "
            . $projectData['priority'] . " "
            . $projectData['start_date'] . " "
            . $projectData['end_date'] . " "
            . $projectData['created_by']
        );
    }
}
