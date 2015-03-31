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
use Carbon\Carbon;

Route::group(array('after' => 'auth'), function () {
	Route::get('/', function(){
		return View::make('blank');
	});
	Route::post('login', 'HomeController@doLogin');
	Route::get('logout', 'HomeController@logout');
});

//Route::group(array('before' => 'auth'), function () {
	Route::controller('menu', 'MenuController');
//});