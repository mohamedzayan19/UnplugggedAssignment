<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use App\Phase;
use App\Holiday;
use Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUserRequest;

class CalendarController extends Controller
{
	 public function show()
    {
    	$projects = Project::all();
    	foreach($projects as $project) {
	    #$eloquentEvent = $project; //EventModel implements MaddHatter\LaravelFullcalendar\Event
	    #$phases = $project->phase()->get();
	    $phases = Phase::where('project_id', $project->id)->get();
	    $events = [];
	    foreach($phases as $phase){
		$events[] = \Calendar::event(
		    $phase->title, //event title
		    true, //full day event?
		    $phase->start, //start time (you can also use Carbon instead of DateTime)
		    $phase->end,
		    $phase->project_id,
		    	[	
        			'color' => '#090',
       
    			] 
		     //optionally, you can specify an event ID
		);
	    }
		for ($i = 1; $i <= 100; $i++) {
   		 $day = date('D', strtotime('+'.$i.' day'));
    		if($day == 'Thu' || $day == 'Fri'){
    			$day = date('c', strtotime('+'.$i.' day'));
    			#echo date('D d/m/Y', strtotime('+'.$i.' day')) ."<br />";
    		$events[] = \Calendar::event(
		    'weekend', //event title
		    true, //full day event?
		    $day, //start time (you can also use Carbon instead of DateTime)
		    $day,
		    'holidays',
		        [	
        			'color' => '#999',
       
    			] 
		);
    	}
    }

#    $holidays = Holiday::all();
 #   foreach($holidays as $holiday){
  #  	    $events[] = \Calendar::event(
	#	    'Holiday', //event title
	#	    true, //full day event?
	#	    $holiday->start, //start time (you can also use Carbon instead of DateTime)
	#	    $holiday->end,
	#	    'holiday',
	#	        [
		        
     #   			'color' => '#999',
       
    #			]  //optionally, you can specify an event ID
	#	);
    #}

	    $eloquentEvent = $project;
		$calendar = \Calendar::addEvents($events)
		->addEvent($eloquentEvent, [ //set custom color fo this event
		        'color' => '#800',
		        'editable' => true
		    ])->setOptions([ //set fullcalendar options
		        'firstDay' => 1,
		        'editable' => false,
		        'weekends' => true
		    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
		        'viewRender' => 'function() {alert("Callbacks!");}',
		        'eventDrop' => 'function(event, dayDelta, revertFunc) {
      		
      		$.ajaxSetup({
            headers: {
                \'X-CSRF-TOKEN\': $(\'meta[name="_token"]\').attr(\'content\')
            }
        	})

		    	alert(dayDelta);
		    	console.log(dayDelta._days);
        		alert(event.title + " was dropped on " + event.start.format("YYYY-MM-DD HH:mm:ss"));
        		 $("#calendar").fullCalendar("updateEvent", event);
        		 console.log(event);
        		if (!confirm("Are you sure about this change?")) {
            		revertFunc();
        		}
        		$.ajax({
   				 url: "http://localhost:8000/projectsupdate/"+event.id,
    			type: "POST",
    			data: {_method:\'put\',  "title": event.title, "start":event.start.format("YYYY-MM-DD"),"end":event.end.format("YYYY-MM-DD"), "days":dayDelta._days },
    			success: function(result) {
        		alert("Success")
    			},
                error: function(data) {
                    alert(JSON.stringify(data));
                    alert("error");
                }
});

    			}'
		    ]); 
		}   

		return view('calendar.show', compact('calendar'));
	}



}