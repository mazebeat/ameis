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
	Route::controller('menu', 'MenuController');
	Route::get('admin', function () {
		return View::make('blank');
	});

	Route::post('returnService', function () {
		$tipoServicio = Input::get('tipoServicio');

		if (isset($tipoServicio) && $tipoServicio != '') {
			$query   = 'EXEC dbo.AMEIS_RetornaServicio "' . $tipoServicio . '", 0, "OK"';
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return \Response::json($data);
		}
	});
});


Route::get('test', function () {
	dd(Proyecto::pendiente()->get());
	var_dump(Cliente::find('C51FB06A-ED9A-418B-8733-3D7F2454368A'));

	$array = array(
		'Documento' => array(
			'Cabecera' => array(
				'Descripcion'       => 'margarita',
				'Estado'            => 'V',
				'Fecha_Vencimiento' => '20140101 00:00',
				'Id_User'           => '1ce01bf0-8a8a-42e6-91eb-d08988650996',
				'Id_Cliente'        => 'e53a3590-5961-4ca1-b4de-9a7214b09a88',
				'Observaciones'     => 'ALEXIS',
				'Validez'           => 20,
				'Subtotal'          => 0,
				'Iva'               => 0,
				'Total'             => 0,
				'Descuento'         => 0
			),
			'Detalle'  => array(
				'Nro_Linea'         => 1,
				'Cod_Producto'      => 'e7e95eaf-5ba8-4109-942b-c1b200d06903',
				'Cantidad'          => 10,
				'Precio'            => 1000,
				'SubTotal'          => 100,
				'Descuento'         => 100,
				'Total'             => 100,
				'EstadoLinea'       => 'V',
				'Observaciones'     => 'AJAJA',
				'Fecha_Vencimiento' => '20140101 00:00',
				'Id_User'           => 16151430
			)
		)
	);

	$xml = \Functions::arrayToXML($array);
	var_dump($xml);

	$query   = 'EXEC dbo.AMEIS_RetornaClientesPorRut ' . Input::get('rut', 16151430) . ', 0, "OK"';
	$resulta = ApiController::exec_sp($query);
	$cel     = $resulta['data'];
	var_dump($cel);

});