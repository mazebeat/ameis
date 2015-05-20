<?php

class ProyectosController extends BaseController
{

	public function crear()
	{

		$validator = Validator::make(Input::all(), array(
			'nct'     => 'required',
			'nproy'   => 'required',
			'cliente' => 'required'
		));

		if ($validator->fails()) {
			$messages = $validator->messages();
			Debugbar::info($messages);

			return Redirect::back()->withErrors($validator)->with('mensaje', $messages);
			// The given data did not pass validation
		}

		$numcotizacion = Input::get('nct');
		$numproyecto   = Input::get('nproy');
		$cliente       = Input::get('cliente');


		$Proyecto = new Proyecto;

		$Proyecto->numcotizacion = $numcotizacion;
		$Proyecto->numproyecto   = $numproyecto;
		$Proyecto->cliente       = $nombrecompleto;


		$Proyecto->save();
		$creaproyecto = "Proyecto Creado Correctamente";

		// return View::make('mantenedorUser')->with('creausuario', $creausuario);

	}

	public function editar($idproy)
	{
		$Proyecto = User::find($idproy);

		return View::make('editarProyecto')->with('proyectos', $Proyecto);
	}

	public function modificar()
	{

	}

	public function eliminar($idusuariocorreo)
	{


	}
}
