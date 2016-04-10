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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/', function() {
    return view('apihome');
});

Route::get('api/speakers', 'ApiController@speakers');
Route::get('api/speakers/{speaker_id}', 'ApiController@speaker_by_id');
Route::get('api/speakers/company/{company_name}', 'ApiController@speakers_for_company');

Route::get('api/sessions', 'ApiController@sessions');
Route::get('api/sessions/{session_id}', 'ApiController@session_by_id');

Route::get('api/timeslots', 'ApiController@timeslots');
Route::get('api/timeslots/{timeslot_id}', 'ApiController@timeslot_by_id');
