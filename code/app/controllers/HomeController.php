<?php

class HomeController extends BaseController
{
	public function index()
	{
		if (Auth::check()) {
			//		dd('dasda');
			if (Auth::viaRemember()) {
				return Redirect::to('admin')->with('rememberMe', 1);
			}
			else {
				return Redirect::to('admin');
			}
		}
		else {
			return View::make('index');
		}
	}

	public function login()
	{

		$validator = User::validate(Input::all());
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->messages())->withInput(Input::except(array(
				                                                                                     'password',
				                                                                                     '_token'
			                                                                                     )));
		}
		else {
			$userdata = array(
				'Mail' => Input::get('mail'),
				'password' => Input::get('password')
			);

			if (Input::get('persist') == 'on') {
				$isAuth = Auth::attempt($userdata, true);
			}
			else {
				$isAuth = Auth::attempt($userdata);
			}

			if ($isAuth) {
				return Redirect::to('/');
			}

			return Redirect::to('/')->withInput(Input::except(array(
				                                                  'password',
				                                                  '_token'
			                                                  )));
		}
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}
