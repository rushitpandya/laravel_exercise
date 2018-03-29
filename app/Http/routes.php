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
    
	if(Auth::guest())
	{
		return view('auth.login');
	}
	else
	{
		 $app = app();
		 $controller = $app->make('BitCoin\Http\Controllers\HomeController');
		 return $controller->callAction('index', $parameters = array());
	}
	
	
});

Route::auth();
Route::get('/login', function () {
	return view('auth.login');
});

Route::get('/register', function () {
	return view('auth.register');
});


Route::get('/welcome', 'HomeController@index');
Route::get('/authenticated', 'HomeController@authenticated');
Route::get('/home', 'HomeController@index');
Route::get('/changecurrency', 'HomeController@changecurrency');

