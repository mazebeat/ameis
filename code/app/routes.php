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
	Route::post('returnComunas', function () {
		$Id_Ciudad = Input::get('Id_Ciudad');

		return Comuna::select(array(
			                      'Descripcion',
			                      'Id_Comuna'
		                      ))->where('Id_Ciudad', $Id_Ciudad)->get(array(
			                                                              'Descripcion',
			                                                              'Id_Comuna'
		                                                              ));
	});
	Route::post('returnService', function () {
		$tipoServicio = Input::get('tipoServicio');

		if (isset($tipoServicio) && $tipoServicio != '') {
			$query   = 'EXEC dbo.AMEIS_RetornaServicio "' . $tipoServicio . '", 0, "OK"';
			$resulta = \ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return \Response::json($data);
		}
	});
	Route::post('returnCotiz', function () {
		$ncotiz = Input::get('ncotiz');

		if (isset($ncotiz) && $ncotiz != '') {
			$query   = 'EXEC dbo.AMEIS_RetornaCotizacion "' . $ncotiz . '", 0, "OK"';
			$resulta = \ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}
	});
	Route::post('returnClient', function () {
		$rut = Input::get('rut');

		if (isset($rut) && $rut != '') {
			if (Str::contains($rut, '-')) {
				$rut   = explode('-', $rut);
				$query = 'EXEC dbo.AMEIS_RetornaClientesPorRut ' . $rut[0] . ', 0, "OK"';
			}
			else {
				$query = 'EXEC dbo.AMEIS_RetornaClientesPorRut ' . $rut . ', 0, "OK"';
			}
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}
	});
	Route::post('saveCotizacion', function () {
		$xml = Input::get('xml');
		$xml = \Functions::toXML($xml);

		$query   = 'EXEC dbo.AMEIS_GeneraCotizacion "' . $xml . '", 0, "OK"';
		$resulta = \ApiController::exec_sp($query);

		return Response::json($resulta);
	});
});


Route::get('test', function () {
	echo "<pre class='xdebug -var-dump' dir='ltr'><small>string</small> <font color='#cc0000'>'&lt;?xml version=&quot;1.0&quot; encoding=&quot;ISO-8859-1&quot; ?&gt;&#13;&#10;&lt;Documento&gt;&#13;&#10;&lt;Cabecera&gt;&#13;&#10;&lt;Descripcion&gt;asdasd&lt;/Descripcion&gt;&#13;&#10;&lt;Estado&gt;V&lt;/Estado&gt;&#13;&#10;&lt;Fecha_Vencimiento&gt;2015-05-23&lt;/Fecha_Vencimiento&gt;&#13;&#10;&lt;Id_User&gt;1CE01BF0-8A8A-42E6-91EB-D08988650996&lt;/Id_User&gt;&#13;&#10;&lt;Id_Cliente&gt;C51FB06A-ED9A-418B-8733-3D7F2454368A&lt;/Id_Cliente&gt;&#13;&#10;&lt;Observaciones&gt;ALEXIS&lt;/Observaciones&gt;&#13;&#10;&lt;Validez&gt;4&lt;/Validez&gt;&#13;&#10;&lt;Subtotal&gt;500&lt;/Subtotal&gt;&#13;&#10;&lt;Iva&gt;95&lt;/Iva&gt;&#13;&#10;&lt;Total&gt;595&lt;/Total&gt;&#13;&#10;&lt;Descuento&gt;0&lt;/Descuento&gt;&#13;&#10;&lt;/Cabecera&gt;&#13;&#10;&lt;Cabecera&gt;&#13;&#10;&lt;Detalle&gt;&#13;&#10;&lt;Nro_Linea&gt;1&lt;/Nro_Linea&gt;&#13;&#10;&lt;Cod_'...</font> <i>(length=932)</i>
	</pre >";

});