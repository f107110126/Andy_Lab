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
        // following command is same result.
        // return view('Tutorial/task', compact('tasks')); // set $tasks => $this->tasks
        // return view('Tutorial/task', ['tasks' => $tasks]); // set $tasks => $this->tasks
        // return view('Tutorial/task', ['Tasks' => $tasks]); // set $Tasks => $this->tasks
        // return view('Tutorial/task')->with('tasks', $tasks); // set $tasks => $this->$tasks
        // return view('Tutorial/task')->with('Tasks', $tasks); // set $Tasks => $this->$tasks
        // return view('Tutorial/task')->withTasks($tasks); // set $tasks => $this->$tasks
        // return view('Tutorial/task')->withtasks($tasks); // set $tasks => $this->$tasks
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
