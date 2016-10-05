<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <style>
        /* ... */
    </style>
</head>
<body>
	<meta name="_token" content="{!! csrf_token() !!}" />
    <a href="/holidays/create">Create holiday</a>
    @if(Auth::user()->isAdministrator())
    <a href="{{action("HomeController@index")}}">Home</a>
    @endif
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
</body>
</html>