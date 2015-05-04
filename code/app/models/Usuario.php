<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class Usuario extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait;

	public static $rules
		                      = array(
			'user'     => 'required',
			'password' => 'required|alphaNum|min:3'
		);
	public        $timestamps = false;
	protected     $table      = 'AME_Mant_Usuarios';
	protected     $primaryKey = 'id_Usuario';
	protected     $hidden
		                      = array(
			'Password',
			'remember_token'
		);

	public static function validate($data)
	{
		return Validator::make($data, static::$rules);
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return Hash::make($this->attributes['Password']);
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->attributes['Mail'];
	}

}
