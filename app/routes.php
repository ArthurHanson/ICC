<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@mainPage'));
Route::post('contact_request','HomeController@doContact');

Route::group(array('before' => 'auth'), function()
{
	Route::resource('cars', 'CarController');
});

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::controller('password', 'RemindersController');
//Route::get('password/reset/{token}', 'RemindersController@getReset');
//Route::post('password/reset/{token}', 'RemindersController@postReset');

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

//404
App::missing(function($exception)
{
	// shows an error page (app/views/error.blade.php)
	// returns a page not found error
	return Response::view('error', array(), 404);
});