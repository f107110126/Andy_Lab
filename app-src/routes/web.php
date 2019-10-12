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

// bind things into services container
app()->bind('example1', function () {
    return new \App\Tutorial\Project;
});

app()->singleton('example2', function () {
    return new \App\Tutorial\Project;
});

app()->singleton('example5', function() {
    return new App\Tutorial\Example5('something blablabla');
});

app()->singleton('App\Tutorial\Example5', function() {
    return new App\Tutorial\Example5('something blablabla');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
/**
 * if want to turn off register:
 * Auth::routes(['register' => false]);
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('tutorial')->group(function () {
    /**
     * same as:
     * Route::get('/tutorial/', function () {
     *     return view('Tutorial/welcome');
     * });
     */
    Route::get('/', function () {
        return view('Tutorial/welcome');
    })->name('Tutorial.home');

    Route::get('/about', function () {
        return view('Tutorial/about');
    })->name('Tutorial.about');

    Route::get('/contact', function () {
        return view('Tutorial/contact');
    })->name('Tutorial.contact');

    Route::get('/tasks', function () {
        $tasks = [
            'First task for sample',
            'Second task for sample',
            'Third task for sample',
            'Fourth task for sample',
            'Fifth task for sample',
        ];
        return view('Tutorial/task', compact('tasks')); // set $tasks => $this->tasks
        /**
         * following command is same result.
         * return view('Tutorial/task', compact('tasks')); // set $tasks => $this->tasks
         * return view('Tutorial/task', ['tasks' => $tasks]); // set $tasks => $this->tasks
         * return view('Tutorial/task', ['Tasks' => $tasks]); // set $Tasks => $this->tasks
         * return view('Tutorial/task')->with('tasks', $tasks); // set $tasks => $this->$tasks
         * return view('Tutorial/task')->with('Tasks', $tasks); // set $Tasks => $this->$tasks
         * return view('Tutorial/task')->withTasks($tasks); // set $tasks => $this->$tasks
         * return view('Tutorial/task')->withtasks($tasks); // set $tasks => $this->$tasks
         */
    })->name('Tutorial.task');

    Route::get('controller/', 'Tutorial\PagesController@home')->name('Tutorial.Controller.home');
    Route::get('controller/about', 'Tutorial\PagesController@about')->name('Tutorial.Controller.about');
    Route::get('controller/contact', 'Tutorial\PagesController@contact')->name('Tutorial.Controller.contact');

    Route::get('projects', 'Tutorial\ProjectsController@index')->name('Tutorial.projects.index');
    Route::get('projects/create', 'Tutorial\ProjectsController@create')->name('Tutorial.projects.create');
    Route::post('projects', 'Tutorial\ProjectsController@store')->name('Tutorial.projects.store');
    Route::get('projects/{project}', 'Tutorial\ProjectsController@show')->name('Tutorial.projects.show');
    Route::get('projects/{project}/edit', 'Tutorial\ProjectsController@edit')->name('Tutorial.projects.edit');
    Route::patch('projects/{project}', 'Tutorial\ProjectsController@update')->name('Tutorial.projects.update');
    Route::delete('projects/{project}', 'Tutorial\ProjectsController@destroy')->name('Tutorial.projects.destroy');

    Route::post('projects/{project}/tasks', 'Tutorial\ProjectTasksController@store')->name('Tutorial.tasks.store');
    Route::patch('projects/{project}/tasks/{task}', 'Tutorial\ProjectTasksController@update')->name('Tutorial.tasks.update');

    Route::post('projects/{project}/completed-task/{task}', 'Tutorial\CompletedTasksController@store')->name('Tutorial.tasks.completed');
    Route::delete('projects/{project}/completed-task/{task}', 'Tutorial\CompletedTasksController@destroy')->name('Tutorial.tasks.completed');

    Route::resource('project2s', 'Tutorial\Project2sController');
    Route::post('project2s/{project2}/task2s', 'Tutorial\ProjectTask2sController@store')->name('project2s.task2s.store');
    Route::post('project2s/{project2}/task2s/{task2}', 'Tutorial\CompletedTask2sController@store')->name('project2s.task2s.completed');
    Route::delete('project2s/{project2}/task2s/{task2}', 'Tutorial\CompletedTask2sController@destroy')->name('project2s.task2s.completed');

    Route::get('services/example1', function () {
        // fetch things out of container
        dd(app('example1'), app('example1'));
    });

    Route::get('services/example2', function () {
        dd(app('example2'), app('example2'));
    });

    Route::get('services/example3', function () {
        /**
         * laravel will first try to fetch from service container,
         * second will try fetch from class,
         * otherwise it will fail to error.
         */
        dd(app('App\Tutorial\Project'));
    });

    Route::get('services/example4', function () {
        /**
         * if there was a class, and it need to instance other class,
         * laravel still will try to instance that.
         */
        dd(app('App\Tutorial\Example'));
    });

    Route::get('services/example5', 'Tutorial\Example5Controller@show');

    /**
     * for a completely resource, it should support 7 situation:
     * Get somethings (index)
     * Get somethings/create (create form)
     * Post somethings (store)
     * Get somethings/id (show something)
     * Get somethings/id/edit (edit something form)
     * Patch somethings/id (update something)
     * Delete somethings/id (delete something)
     */
});
