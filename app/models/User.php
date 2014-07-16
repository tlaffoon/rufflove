<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	    'role'		=> 'required'
	);

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}

	protected $imgDir = 'img-upload';

	public function addUploadedImage($image) {
	    $systemPath = public_path() . '/' . $this->imgDir . '/';
	    $imageName = $this->id . '-' . $image->getClientOriginalName();
	    $image->move($systemPath, $imageName);
	    $this->img_path = '/' . $this->imgDir . '/' . $imageName;
	}

	public function dogs() {
	    return $this->hasMany('Dog');
	}
}
