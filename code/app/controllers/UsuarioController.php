<?php

class UsuarioController extends BaseController
{
	public function postLogin(){

		$validator = Usuario::validate(Input::all());
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->messages())->withInput(Input::except(array('password','_token')));
		}
		else {

			$userdata = array(
				'Usuario'  => Input::get('user'),
				'password' => Input::get('password')
			);

			if (Auth::attempt($userdata, true)) {
				return Redirect::to('admin');
			}
			else {
				return Redirect::back()->withErrors()->withInput(Input::except(array('password','_token')));
			}

		}
	}

	public function index()
	{
		$usuarios = User::all();

		return View::make('mantenedorUser')->with('usuarios', $usuarios);
	}

	public function filtros()
	{

		$username = Input::get('username');
		$nombre   = Input::get('nombrecompleto');
		$rut      = Input::get('rut');
		$typeuser = Input::get('typeuser');
	}

	public function crear()
	{

		$validator = Validator::make(Input::all(), array(
			'username'       => 'required|unique:usuariocorreo',
			'password'       => 'required|min:8',
			'nombrecompleto' => 'required',
			'rut'            => 'required|unique:usuariocorreo'
		));

		if ($validator->fails()) {
			$messages = $validator->messages();
			Debugbar::info($messages);

			return Redirect::back()->withErrors($validator)->with('mensaje', $messages);
			// The given data did not pass validation
		}

		$username       = Input::get('username');
		$password       = Input::get('password');
		$nombrecompleto = Input::get('nombrecompleto');
		$rut            = Input::get('rut');
		$typeuser       = Input::get('typeuser');

		$User = new User;

		$User->username       = $username;
		$User->password       = Hash::make($password);
		$User->nombrecompleto = $nombrecompleto;
		$User->rut            = $rut;
		$User->typeuser       = $typeuser;

		$User->save();
		$creausuario = "Usuario Creado/Modificado Correctamente";

		return View::make('mantenedorUser')->with('creausuario', $creausuario);

	}

	public function editar($idusuariocorreo)
	{
		$User = User::find($idusuariocorreo);

		return View::make('editarUsuario')->with('usuario', $User);
	}

	public function modificar()
	{

		$username       = Input::get('username');
		$password       = Input::get('password');
		$nombrecompleto = Input::get('nombrecompleto');
		$rut            = Input::get('rut');
		$typeuser       = Input::get('typeuser');

		$idusuariocorreo = Input::get('idusuariocorreo');

		$User                 = User::find($idusuariocorreo);
		$User->username       = $username;
		$User->password       = Hash::make($password);
		$User->nombrecompleto = $nombrecompleto;
		$User->rut            = $rut;
		$User->typeuser       = $typeuser;

		$User->save();
	}

	public function eliminar($idusuariocorreo)
	{

		$User = User::find($idusuariocorreo);
		$User->delete();

		return Redirect::to('mantenedorUser');

	}
}
