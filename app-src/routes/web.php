<?php

// for debug
// DB::listen(function ($query) {var_dump($query->sql, $query->bindings);});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::post('/tweets/{tweet}/dislike','TweetLikesController@store');
    
    Route::post('/profiles/{user}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user}', 'ProfilesController@update')->middleware('can:edit,user');
    Route::get('/explore', 'ExploreController');
});

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles');
