<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view("projects.index", ["projects" => $projects]);
    }

    public function store(){

        $attributes = request()->validate([
            "title" => "required",
            "description" => "required"
            ]);

        auth()->user()->projects()->create($attributes);

        return redirect("/projects");
    }

    public function show(Project $project){

        return view("projects.show", ["project" => $project]);
    }
}
