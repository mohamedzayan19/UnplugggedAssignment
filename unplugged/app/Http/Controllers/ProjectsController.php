<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\Phase;
use App\User;
use Illuminate\Support\Facades\Log;
use Search;
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
        $project->start = $request->start;
        $project->end = $request->end;
        $project->save();

        $phase1 = new Phase;
        $phase1->title = $request->phase1Title;
        $phase1->start = $request->phase1Start;
        $phase1->end = $request->phase1End;
        $phase1->project_id =$project->id;
        $phase1->save();

        $phase2 = new Phase;
        $phase2->title = $request->phase2Title;
        $phase2->start = $request->phase2Start;
        $phase2->end = $request->phase2End;
        $phase2->project_id =$project->id;
        $phase2->save();

        $phase3 = new Phase;
        $phase3->title = $request->phase3Title;
        $phase3->start = $request->phase3Start;
        $phase3->end = $request->phase3End;
        $phase3->project_id =$project->id;
        $phase3->save();
        Search::insert('project'.$project->id, array(
        'title' => $request->title,
        ));
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

        public function updateTime(Request $request, $projects)
    {
        $project = Project::find($projects);
        $project->start = $project->start->addDays($request->days);
        $project->end = $project->end->addDays($request->days);
        $project->save();
        $phases = Phase::where('project_id',$projects)->get();
        foreach($phases as $phase){
            $phase->start = $phase->start->addDays($request->days);
            $phase->end = $phase->end->addDays($request->days);
            $phase->save();
        }
    }
}
