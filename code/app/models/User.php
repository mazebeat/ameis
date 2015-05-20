<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait;

	public static $rules
		= array(
			'mail'     => 'required|email|exists:AME_Mant_Usuarios,Mail|max:100',
			'password' => 'required|alphaNum|max:100'
		);

	public static $messages
		= array(
			'mail.exists' => 'El email no existe en nuestros registros',
		);

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public    $timestamps = false;
	protected $table      = 'AME_Mant_Usuarios';
	protected $primaryKey = 'Id_Usuario';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden
		= array(
			'Password',
			'remember_token'
		);

	public static function validate($data)
	{
		return Validator::make($data, static::$rules, static::$messages);
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
