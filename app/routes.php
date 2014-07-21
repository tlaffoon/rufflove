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

// Route resources for 'users'
// Route resources for 'posts'

Route::get('/master', 'HomeController@showMaster');

Route::get('test', function () {

    $maxHeight = 200;
    $maxWidth = 200;

    $newHeight = 0;
    $newWidth = 0;

    $inputFile = public_path() . '/' . 'rocket.jpg';
    $outputFile = public_path() . '/' . 'rocket-small.jpg';

    // load the image to be manipulated
    $image = new Imagick($inputFile);

    // get the current image dimensions
    $currentWidth = $image->getImageWidth(); 
    $currentHeight = $image->getImageHeight();

    // determine what the new height and width should be based on the type of photo
    if ($currentWidth > $currentHeight)
    {
        // landscape photo
        // width should be resized to max and height should be resized proportionally
        $newWidth = $maxWidth;
        $newHeight = ceil($currentHeight * ($newWidth / $currentWidth));
    }
    else if ($currentHeight > $currentWidth)
    {
        // portrait photo
        // height should be resized to max and width should be resized proportionally
        $newHeight = $maxHeight;
        $newWidth = ceil($currentWidth * ($newHeight / $currentHeight));
    }
    else
    {
        // square photo
        // resize image to max dimensions
        $newHeight = $newWidth = $maxHeight;
    }

    // perform the image resize
    $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, true);  

    // write out the new image
    $image->writeImage($outputFile);

    // clear memory resources
    $image->clear(); 
    $image->destroy();

    return 'Done';

});
Route::get('/dogsearch', 'HomeController@showDogSearch');

Route::get('/register', 'HomeController@showRegistration');
Route::get('/about', 'HomeController@showAbout');
Route::get('/', 'HomeController@showHome');

Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');
Route::get('/search', 'HomeController@showSearch');


Route::get('/resume', 'HomeController@showResume');
Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
Route::resource('dogs', 'DogsController');

// Route::get('test', 'HomeController@showTest');

Route::get('geocode', 'HomeController@showMap');


Route::get('/test2', function () {
	ini_set('auto_detect_line_endings', true);
	$breedsFile = storage_path() . '/csv/breeds.txt';
    $breeds = file($breedsFile);

    foreach ($breeds as $breed)
    {
    	echo '<p>' . $breed . '</p>';
    }
});
