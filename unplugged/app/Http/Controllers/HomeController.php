<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allProjects = Project::all();
        $myProjects = Auth::user()->projects()->get();
        if (strpos(redirect()->back()->getTargetUrl(), 'login') === false) {
            return view('home.index', compact('allProjects', 'myProjects'));
        } else {
            return view('home.index', compact('allProjects', 'myProjects'))->with('message', 'Welcome ' . Auth::user()->fullName());
        }
    }


}
