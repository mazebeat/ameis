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

//Route::group(array('after' => 'auth'), function () {

Route::get('/', function () {
	return View::make('index');
});
Route::post('/', 'UsuarioController@postLogin');
Route::get('logout', 'HomeController@logout');
//});

//Route::group(array('before' => 'auth'), function () {
Route::controller('menu', 'MenuController');
Route::get('admin', function () {
	return View::make('blank');
});
//});

Route::get('test', function () {
		$query   = 'EXEC dbo.AMEIS_RetornaClientesPorRut ' . Input::get('rut') . ', 0, "OK"';
		$resulta = ApiController::exec_sp($query);
		$cel     = $resulta['data'][0];
		var_dump($cel);
		die();

});