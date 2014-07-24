<?php

class UsersController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    // Commented out auth filter for demo day, need additional work to allow users to create without login, and then login on user creation to their show page.
	    // $this->beforeFilter('auth', ['except' => ['create', 'show', 'store']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
		 	$queryString = Input::get('search');
		 	$users = user::where('username', 'LIKE', "%$queryString%")->orderBy('username')->paginate(5);
		}

		else {
			$users = User::orderBy('username')->paginate(5);
		}
		
	    return View::make('users.index')->with(array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create-edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
		$validator = Validator::make(Input::all(), User::$rules);

		// attempt validation
		if ($validator->fails()) {
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');

		    // validation failed, redirect to the user create page with validation errors and old inputs
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		
		else {

		    $user = new User();

		    $user->username 	= Input::get('username');
		    $user->email 		= Input::get('email');
		    $user->password 	= Input::get('password');
		    $user->first_name 	= Input::get('first_name');
		    $user->last_name 	= Input::get('last_name');
			$user->address		= Input::get('street_num') . ' ' . Input::get('street');
		    $user->city 		= Input::get('city');
		    $user->state 		= Input::get('state');
		    $user->zip 			= Input::get('zip');
		    $user->country 		= Input::get('country');
		    $user->role 		= Input::get('role');
		    $user->lat			= Input::get('latitude');
		    $user->lng			= Input::get('longitude');

		    $user->fullAddress	= $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;

		    $user->save();

		    // Handle Image Uploads
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));  // call method from User model
		        $user->save();
		    }

		    else {
		    	$user->img_path = '/includes/img/placeholder-user.png';
		    	$user->save();
		    }
		    
		    Session::flash('successMessage', 'User saved successfully.');
		    return Redirect::action('UsersController@show', $user->id);
		    // return Redirect::back();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('users.show')->with('user', User::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.create-edit')->with('user', User::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($id != null) {
			$user = User::findOrFail($id);
		}

		else {
			$user = new User();
		}

		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {

			$user->username 	= Input::get('username');
			$user->email 		= Input::get('email');
			$user->password 	= Input::get('password');
			$user->first_name 	= Input::get('first_name');
			$user->last_name 	= Input::get('last_name');
			$user->address		= Input::get('street_num') . ' ' . Input::get('street');
			$user->city 		= Input::get('city');
			$user->state 		= Input::get('state');
			$user->zip 			= Input::get('zip');
			$user->country 		= Input::get('country');
			$user->role 		= Input::get('role');
		    $user->lat			= Input::get('latitude');
		    $user->lng			= Input::get('longitude');

			$user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;

			$user->save();

			// Handle Image Uploads
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		    	$user->addUploadedImage(Input::file('image'));  // call method from User model
		        $user->save();
		    }

		    else {
		    	$user->img_path = '/includes/img/placeholder-user.png';
		    	$user->save();
		    }

		    Session::flash('successMessage', 'User saved successfully.');
		}
		
		//return Redirect::back();
		return Redirect::action('UsersController@show', $user->id);	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Deletes dogs that were associated with this user.
		DB::table('dogs')
		            ->where('user_id', $id)
		            ->delete();

		$user = User::find($id);
		$user->delete();

		Session::flash('successMessage', 'User deleted successfully.');

		return Redirect::intended(back());
	}
}
