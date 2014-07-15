<?php

class DogsController extends \BaseController {

	// public function __construct()
	// {
	//     // call base controller constructor
	//     parent::__construct();

	//     // run auth filter before all methods on this controller except index and show
	//     $this->beforeFilter('auth.basic', array('except' => array('index', 'show')));
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
		 	$queryString = Input::get('search');
		 	$dogs = Dog::where('name', 'LIKE', "%$queryString%")->orderBy('name')->paginate(5);
		}

		else {
			$dogs = Dog::orderBy('name')->paginate(5);
		}
		
	    return View::make('dogs.index')->with(array('dogs' => $dogs));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dogs.create-edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
		$validator = Validator::make(Input::all(), Dog::$rules);

		// attempt validation
		if ($validator->fails()) {
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');

		    // validation failed, redirect to the dog create page with validation errors and old inputs
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		
		else {
		    $dog = new Dog();
		    $dog->name = Input::get('name');
		    $dog->password = Input::get('password');
		    $dog->first_name = Input::get('first_name');
		    $dog->last_name = Input::get('last_name');
		    $dog->email= Input::get('email');
		    $dog->role = Input::get('role');

		    $dog->save();

		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $dog->addUploadedImage(Input::file('image'));
		        $dog->save();
		    }	

		    Session::flash('successMessage', 'Dog saved successfully.');
		    return Redirect::action('DogsController@show', $dog->id);
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
		return View::make('dogs.show')->with('dog', Dog::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('dogs.create-edit')->with('dog', Dog::find($id));
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
			$dog = Dog::findOrFail($id);
		}

		else {
			$dog = new Dog();
		}

		$validator = Validator::make(Input::all(), Dog::$rules);

		if ($validator->fails()) {
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {
			$dog->name = Input::get('name');
			$dog->password = Input::get('password');
			$dog->first_name = Input::get('first_name');
			$dog->last_name = Input::get('last_name');
			$dog->email= Input::get('email');
			$dog->role = Input::get('role');

			$dog->save();

		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $dog->addUploadedImage(Input::file('image'));
		        $dog->save();
		    }	

		    // Session::flash('successMessage', 'Dog saved successfully.');
		}
		
		return Redirect::action('DogsController@show', $dog->id);	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		DB::table('posts')
		            ->where('dog_id', $id)
		            ->delete();

		$dog = Dog::find($id);
		$dog->delete();

		Session::flash('successMessage', 'Dog deleted successfully.');

		return Redirect::action('DogsController@index');	
	}
}
