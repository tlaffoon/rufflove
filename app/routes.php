<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Route::get('/', 'HomeController@showSplash');

Route::get('/', 'HomeController@showHome');

Route::get('/about', 'HomeController@showAbout');
Route::get('/admin', 'HomeController@showAdmin');

Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');

Route::get('/master', 'HomeController@showMaster');

Route::get('/map', 'HomeController@showMap');  // demo map page 

Route::get('/search', 'HomeController@showSearch');

Route::get('/map', 'HomeController@showMap');  // demo map page 
Route::post('/map', function () {

    $address = Input::get('address');
    
    $error = false;
    
    $result = array(
        'error' => $error,
        'message' => "$address",
    );

    return Response::json($result);
});

Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
Route::resource('dogs', 'DogsController');

Route::get('/register', 'HomeController@showRegistration');

Route::get('/signup', 'HomeController@showRegistration');

// Route::get('/test', 'HomeController@showTest');

Route::get('/search', 'HomeController@showSearch');

Route::post('/search', function () {

    $dog_name   = Input::get('search-name');
    $search_zip = Input::get('search-zip');
    $distance   = Input::get('distance');
    $sex        = Input::get('sex');
    $purebred   = Input::get('purebred');

    $zipDetails = DB::select('call zip_proximity(?,?,?)', array($search_zip, $distance, 'mi')); // need to refactor to use sanitized input
    $zips = [];
    
    foreach ($zipDetails as $zip)
    {
        $zips[] = $zip->zip;
    }

    // All dogs; eager load breed + user
    $query = Dog::with('breed', 'user');

    // Filter on breed
    $query->whereHas('breed', function($q) {
        $breed_id = Input::get('search-breed');
        $q->where('id', '=', $breed_id);
    });

    if (isset($sex)) {
        $query->where('sex', '=', $sex);
    }

    if (isset($purebred)) {
        $query->where('purebred', '=', $purebred);
    }

    // Select users from array of zips
    $query->whereHas('user', function($q) use ($zips) {
        $q->whereIn('zip', $zips);
    });

    $results = $query->get();

    return Response::json($results);
});
















// Route::get('test', function () {

//     $maxHeight = 200;
//     $maxWidth = 200;

//     $newHeight = 0;
//     $newWidth = 0;

//     $inputFile = public_path() . '/' . 'rocket.jpg';
//     $outputFile = public_path() . '/' . 'rocket-small.jpg';

//     // load the image to be manipulated
//     $image = new Imagick($inputFile);

//     // get the current image dimensions
//     $currentWidth = $image->getImageWidth(); 
//     $currentHeight = $image->getImageHeight();

//     // determine what the new height and width should be based on the type of photo
//     if ($currentWidth > $currentHeight)
//     {
//         // landscape photo
//         // width should be resized to max and height should be resized proportionally
//         $newWidth = $maxWidth;
//         $newHeight = ceil($currentHeight * ($newWidth / $currentWidth));
//     }
//     else if ($currentHeight > $currentWidth)
//     {
//         // portrait photo
//         // height should be resized to max and width should be resized proportionally
//         $newHeight = $maxHeight;
//         $newWidth = ceil($currentWidth * ($newHeight / $currentHeight));
//     }
//     else
//     {
//         // square photo
//         // resize image to max dimensions
//         $newHeight = $newWidth = $maxHeight;
//     }

//     // perform the image resize
//     $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, true);  

//     // write out the new image
//     $image->writeImage($outputFile);

//     // clear memory resources
//     $image->clear(); 
//     $image->destroy();
// }
