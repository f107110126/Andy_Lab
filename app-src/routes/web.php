<?php

use App\Article;

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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    // $articles = Article::all();
    // $articles = Article::take(2)->get();
    // $articles = Article::paginate(2); # 2 data for per page
    // $articles = Article::latest()->get(); # order by created_at
    // $articles = Article::latest('updated_at')->get(); # order by updated_at
    $articles = Article::latest()->take(3)->get();
    return view('about', ['articles' => $articles]);
});

Route::name('articles.')->group(function () {
    Route::get('/articles', 'ArticlesController@index')->name('index');
    Route::get('/articles/create', 'ArticlesController@create');
    Route::get('/articles/{article}', 'ArticlesController@show')->name('show');
    Route::get('/articles/{article}/edit', 'ArticlesController@edit');

    Route::post('/articles', 'ArticlesController@store')->name('store');
    Route::put('/articles/{article}', 'ArticlesController@update')->name('update');
});
