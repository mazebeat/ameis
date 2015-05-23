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
// dd(phpinfo());
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@login');
Route::get('logout', 'HomeController@logout');

Route::group(array('before' => 'auth'), function () {
	Route::get('admin', function () {
		return \View::make('dashboard');
	});
	Route::controller('menu', 'MenuController');
	Route::post('returnComunas', 'ApiController@returnComunas');
	Route::post('returnService', 'ApiController@returnService');
	Route::post('returnClient', 'ApiController@returnClient');
	Route::post('saveCotizacion', 'ApiController@saveCotizacion');
	Route::post('returnCotizacion', 'ApiController@returnCotizacion');
});


Route::get('test', function () {
});