<?php

class MenuController extends BaseController
{
	/**
	 * Instantiate a new MenuController instance.
	 */
	public function __construct()
	{
		$this->beforeFilter(function () {
			//
		});
	}

	public function getIndex()
	{
		return View::make('blank');
	}

	public function getOrdentrabajo()
	{
		return View::make('ordentrabajo');
	}

	public function getProyectos()
	{
		$comunas    = Comuna::lists('Descripcion', 'Id_Comuna');
		$unidades   = UnidadMedida::lists('Descripcion', 'Id_UnidadMedida');
		$pendientes = Proyecto::pendiente()->get();

		return View::make('proyectos')->withComunas($comunas)->withUnidades($unidades)->withPendientes($pendientes);
	}

	public function getKardex()
	{
		return View::make('kardex');
	}

	public function getMantenedorcliente()
	{
		$comunas = Comunas::all();
		$users   = User::all();

		return View::make('mantenedorcliente')->withUsers($users)->withComunas($comunas);
	}

	public function getRecepciondocumento()
	{
		return View::make('recepciondocumento');
	}

	public function getMantenedorproductos()
	{
		return View::make('mantenedorproductos');
	}

	public function getMantenedorpersonal()
	{
		return View::make('mantenedorpersonal');
	}

	public function getMantenedorcargos()
	{
		return View::make('mantenedorcargos');
	}

	public function getInformes()
	{
		return View::make('informes');
	}

	public function getCotizaciones()
	{
		$comunas = Comuna::lists('Descripcion', 'Descripcion');
		//		$comunas       = Comuna::lists('Descripcion', 'Id_Comuna');
		//		$ciudades      = Ciudad::lists('Descripcion', 'Id_Ciudad');
		$ciudades      = Ciudad::lists('Descripcion', 'Descripcion');
		$tipoServicios = TipoServicio::lists('Nombre_TipoServicio', 'Id_TipoServicio');
		$unidades      = UnidadMedida::lists('Descripcion', 'Id_UnidadMedida');
		$pendientes    = Cotizacion::pendiente()->get();

		return View::make('cotizaciones')->withComunas($comunas)->withCiudades($ciudades)->withTservicios($tipoServicios)->withUnidades($unidades)->withPendientes($pendientes);
	}

	public function getUsers()
	{
		return View::make('users.create');
	}

	public function getProductos()
	{
		return View::make('productos');

	}

	public function getProductounidad()
	{
		return View::make('productoUnidad');

	}

	public function getMedidas()
	{
		return View::make('medidas');

	}

	//	public function postCotizaciones()
	//	{
	//		$inputs = Input::all();
	//		$rules  = array();
	//
	//		if ($this->validateInputs($rules)) {
	//			dd($inputs);
	//		}
	//	}

}
