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

Route::get('/contact', 'ContactController@show');

Route::post('/contact', 'ContactController@store');

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

Route::prefix('auth')->group(function () {
    Route::get('/', function () {
        return view('default-welcome');
        // same as
        // return Illuminate\Support\Facades\View::make('default-welcome');
    });
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    // trigger this uri must be login
});

Route::prefix('service-container')->group(function () {
    app()->bind('example', function () {
        $foo = config('services.foo');
        return new App\Example($foo);
    });
    app()->bind('App\Example3', function () {
        $collaborator = new App\Collaborator();
        $foo = 'foobar'; // if not setup foo, will not auto-resolve
        return new App\Example3($collaborator, $foo);
        // for path 'p5';
    });
    Route::get('/', function () {
        $container = new App\Container();
        $container->bind('example', function () {
            return new App\Example();
        });

        $example = $container->resolve('example');
        // ddd($container, $example);
        $example->go();
    });
    Route::get('/p2', function () {
        $example1 = resolve('example');
        $example2 = resolve(App\Example::class);
        // $example3 = resolve(App\Example2::class);
        $example3 = app()->make(App\Example2::class);
        ddd($example1, $example2, $example3);
    });
    Route::get('/p3', function (App\Example2 $example) {
        ddd($example);
    });
    Route::get('/p4', 'ExamplesController@home1');
    Route::get('/p5', 'ExamplesController@home2');
});

Route::get('/payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('/payments', 'PaymentsController@store')->middleware('auth');
Route::get('/notifications', 'UserNotificationsController@show')->middleware('auth');
