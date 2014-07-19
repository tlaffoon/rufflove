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

Route::get('/dogsearch', 'HomeController@showDogSearch');

Route::get('/register', 'HomeController@showRegistration');
Route::get('/about', 'HomeController@showAbout');
Route::get('/', 'HomeController@showHome');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@doLogout');
Route::get('/search', 'HomeController@showSearch');


Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
Route::resource('dogs', 'DogsController');

Route::get('/test', 'HomeController@showTest');

// Route::get('/geocode', 'HomeController@showMap');

Route::get('/map', 'HomeController@showMap');  // demo map page 

Route::get('ajax', function () {
    return View::make('ajax');
});

Route::post('ajax', function () {

    $id = Input::get('baby_id');
    $name = Input::get('baby_name');

    $error = false;
    $message = "Successfully processed id: $id with name: $name.";

    $result = array(
        'error' => $error,
        'message' => $message,
    );

    return Response::json($result);

});

Route::get('/ajax-map', 'HomeController@showAjaxMap');

// Route::get('/ajax', 'HomeController@showAjax');
// Route::get('/ajax', function () {
// 	$id = Input::get('baby_id');
// 	$name = Input::get('baby_name');

// 	$error = 
// 	$message = 

// 	$result = array(
// 		'error' => 
// 		'message' =>
// 		);
// 	return Response::json($result);
// });


// this needs to be refactored out.
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

//     return 'Done';

// });


// Route resources for 'users'
// Route resources for 'posts'

// Route::get('test', function () {

//     $maxHeight = 200;
//     $maxWidth = 200;

//     $newHeight = 0;
//     $newWidth = 0;

//     $inputFile = public_path() . '/' . 'rocket.jpg';
//     $outputFile = public_path() . '/' . 'rocket-small.jpg';

    // load the image to be manipulated
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

//     return 'Done';

// });
