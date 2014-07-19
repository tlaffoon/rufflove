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