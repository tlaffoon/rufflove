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



