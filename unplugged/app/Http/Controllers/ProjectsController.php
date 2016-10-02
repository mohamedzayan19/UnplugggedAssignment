<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Log;
class ProjectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        #$this->middleware('admin', ['except' => ['show','create','store']]);
    }

    public function store(CreateProjectRequest $request)
    {
        $project = new Project;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = $request->user_id;
        $project->save();
        return redirect(action('HomeController@index'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
            return view('projects.show')
            ->with('project', $project);
    }

    public function update(CreateProjectRequest $request, $projects)
    { 
        $project = Project::find($projects);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        return redirect(action('HomeController@index'));
    }

    public function destroy($projects)
    {
        $project = Project::find($projects);
        $project->delete();
        return redirect(action('HomeController@index'));
    }


    public function edit($project)
    {
        $projecta = Project::find($project);
        return view('projects.edit')
            ->with('project', $projecta);
    }
}
