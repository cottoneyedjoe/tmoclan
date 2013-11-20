<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Magniloquent\Magniloquent\Magniloquent;

class User extends Magniloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
	protected $guarded = array('_token');
	public static $rules = array(
		"save"	=>	array(
			"email"	=>	"required|email",
			"password"	=>	"required|min:4",
			),
		"create"	=>	array(
			"email"	=>	"required|unique:users",
			"password"	=>	"confirmed",
			"password_confirmation"	=>	"required|min:4",
			),
		"update" => array()
		);

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
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function chat()
	{
		return $this->hasMany('Chat');
	}

}