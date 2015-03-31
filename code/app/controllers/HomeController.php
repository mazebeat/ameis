<?php

class HomeController extends BaseController
{

	public function doLogin()
	{

		Config::set('auth.username', 'usuario');
		Config::set('auth.password', 'contraseña');

		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);

		$messages = array(
			'username' => 'Campo usuario es requerido',
			'password' => 'Campo contraseña es requerido'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
		} else {
			$credentials = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

			if (Auth::attempt($credentials)) {
				return Redirect::to('graficosCorreos');
			} else {
				return Redirect::to('/');
			}
		}
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}
