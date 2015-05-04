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
		return View::make('proyectos');
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
		return View::make('cotizaciones');
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
