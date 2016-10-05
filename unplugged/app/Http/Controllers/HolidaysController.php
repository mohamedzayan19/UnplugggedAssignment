<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateHolidayRequest;
use App\Holiday;
use Illuminate\Support\Facades\Log;

class HolidaysController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function store(CreateHolidayRequest $request)
    {
        $holiday = new Holiday;
        $holiday->title = $request->title;
        $holiday->start = $request->start;
        $holiday->end = $request->end;
        $holiday->save();   
        return redirect(action('CalendarController@show'));
    }

    public function create()
    {
        return view('holidays.create');
    }

    
}
