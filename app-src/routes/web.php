<?php

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

Route::get('/json', function () {
    return ['message' => 'Hello world.'];
});

Route::get('/arguments', function () {
    return request()->all();
});

Route::get('/arguments-view', function () {
    return view('argument', [
        'name' => request('name'),
    ]);
});

Route::get('/posts/{post}', function ($post) {
    $posts = [
        'first-post' => 'this is first post.',
        'second-post' => 'this is second post.',
    ];

    // return ['post' => $posts[$post] ?? 'post not found.'];

    if (!array_key_exists($post, $posts)) {
        abort(404, 'post not found.');
    }

    return ['post' => $posts[$post]];
});

Route::get('/posts2/{post}', 'PostsController@show');
