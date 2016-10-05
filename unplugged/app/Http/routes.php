<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', function () {
#    return view('welcome');
#});

Route::get('/',['as' => 'home','uses' => 'HomeController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::resource('users','UsersController');
Route::resource('projects','ProjectsController');
Route::get('/redirect', 'FacebookController@redirect');
Route::get('/callback', 'FacebookController@callback');
Route::get('/calendar', 'CalendarController@show');
Route::put('/projectsupdate/{projects}', 'ProjectsController@updateTime');
Route::get('/holidays/create', 'HolidaysController@create');
Route::post('/holidays', 'HolidaysController@store');
Route::post('/search', 'SearchController@search');
