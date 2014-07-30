<?php

class DogsController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$dogs = Dog::all();

		$q = Dog::query();

		  if (Input::has('search-name'))
		  {		     
		     $q->where('name','like',Input::get('search-name'));
		  }

		  if (Input::has('search-breed'))
		  {
		     $q->searchBreed(Input::get('search-breed'));
		  }

		  if (Input::has('sex'))
		  {
		     $q->where('sex', Input::get('sex'));
		  }

		  if (Input::has('age'))
		  {
		     $q->where('age', Input::get('age'));
		  }

		  if (Input::has('purebred'))
		  {
		     $q->where('purebred', Input::get('purebred'));
		  }

		  if (Input::has('radius'))
		  {
		  	// $dogs->user->zip - gives the zip code of the dog's owner
		  	$radius = Input::get('radius');
		  	$zip_code = $dogs->user->zip;
		  	$zipQuery = DB::statement("CALL zip_proximity(:zip, :radius, 'mi'", array('zip' => $zip_code,'radius' => $radius ));
		  	// Must define users...
		  	//$q->where $user->zip in ($zipQuery);
		  	// ... 
		     
		  }

		  $dogs = $q->orderBy('name')->paginate(5);
		
	    return View::make('dogs.index')->with(array('dogs' => $dogs));
		} //end function index()


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

		    $dog->name 		= Input::get('name');
			$dog->breed_id	= Input::get('breed');
		    $dog->purebred 	= Input::get('purebred');
		    $dog->age 		= Input::get('age');
		    $dog->weight 	= Input::get('weight');
		    $dog->sex 		= Input::get('sex');

		    $dog->user_id 	= Input::get('owner'); // gets id from dropdown value

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

			$dog->name 		= Input::get('name');
			$dog->breed_id	= Input::get('breed');
			$dog->purebred 	= Input::get('purebred');
			$dog->age 		= Input::get('age');
			$dog->weight 	= Input::get('weight');
			$dog->sex 		= Input::get('sex');

		    $dog->user_id 	= Input::get('owner'); // gets id from dropdown value

			$dog->save();

		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $dog->addUploadedImage(Input::file('image'));
		        $dog->save();
		    }	

		    Session::flash('successMessage', 'Dog saved successfully.');
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
		
		// DB::table('posts')
		//             ->where('dog_id', $id)
		//             ->delete();

		$dog = Dog::find($id);
		$dog->delete();

		Session::flash('successMessage', 'Dog deleted successfully.');

		return Redirect::intended(back());
	}
}
