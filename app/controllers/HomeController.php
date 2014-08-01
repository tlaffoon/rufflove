<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showSplash() {
		return View::make('splash');
	}

	public function showDogSearch() {
		return View::make('dogs.dogsearch');
	}

	public function showRegistration() {
		return View::make('users.registration');
	}

	public function showAtm() {
		return View::make('atm_finder');
	}
	

	public function showTest() {
		return View::make('test');
	}

	public function showAbout()
	{
		return View::make('about');
	}

	public function showHome()
	{
		return View::make('layouts.new-homepage');
	}

	public function showAdmin()
	{
		return View::make('admin');
	}


	public function showLogin()
	{
		return View::make('homepage');
	}
	
	public function showSearch()
	{
		return View::make('search');
	}

	public function showMap()
	{
		return View::make('map');
	}


	public function showAuto() 
	{
		View::make('autocomplete');
	}

	public function showAjax() 
	{
		return View::make('ajax');
	}

	public function doLogin() 
	{

		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|min:6' // password can only be alphanumeric and has to be greater than 6 characters
		);


		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 

		else 
		{

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)) 
			{
				Session::flash('successMessage', 'Login successful.');
		    	return Redirect::intended('/');
			}
			
			else
			{
				Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');
				return Redirect::to('/')->withInput();
			}
		}
	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		Session::flash('successMessage', 'Logout successful.');
		return Redirect::action('HomeController@showHome'); // redirect the user to the homepage
	}
}
