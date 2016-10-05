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
    /**
     * A search object(user,project) is inserted into an index when either of them
     * is created. this function loops through the index using given criteria to fetch search results
     * @return results[]
     */
    public function search(SearchRequest $request)
    {
        $results = Search::search('title', $request->get('query'))->get();
        return view('home.search', compact('results'));
    }

}
