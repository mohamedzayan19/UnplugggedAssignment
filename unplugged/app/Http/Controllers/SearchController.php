<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Search;
class SearchController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        #$this->middleware('admin', ['except' => ['show','create','store']]);
    }

    public function search(SearchRequest $request)
    {
        $results = Search::search('title', $request->get('query'))->get();
        return view('home.search', compact('results'));
    }

}
