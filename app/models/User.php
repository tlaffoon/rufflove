<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

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
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
	    'username'  => 'required|max:20',
	    'email'		=> 'required|max:200',
	    'password'	=> 'required',
	);

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}

	public function dogs() {
	    return $this->hasMany('Dog');
	}
}
