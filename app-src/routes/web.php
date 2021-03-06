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

app()->singleton('example5', function () {
    return new \App\Tutorial\Example5('something blablabla');
});

app()->singleton('App\Tutorial\Example5', function () {
    return new \App\Tutorial\Example5('something blablabla');
});

app()->singleton('example7', function () {
    return new \App\Services\Example7('this is from example6');
});

app()->singleton('App\Services\Example7', function () {
    return new \App\Services\Example7('this is from example7');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('auth', 'HomeController@welcome')->middleware('auth', 'perm');
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

    // this is a little weird, but it is work fine.
    // Route::resource('projects', 'Tutorial\ProjectsController')->middleware('can:view,project');
    // Route::resource('projects', 'Tutorial\ProjectsController')->middleware('can:view,project')->except(['index', 'store', 'create']);

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

    Route::post('project2s/{project2}/task2s', 'Tutorial\ProjectTask2sController@store')->name('project2s.task2s.store');
    Route::post('project2s/{project2}/task2s/{task2}', 'Tutorial\CompletedTask2sController@store')->name('project2s.task2s.completed');
    Route::delete('project2s/{project2}/task2s/{task2}', 'Tutorial\CompletedTask2sController@destroy')->name('project2s.task2s.completed');

    Route::prefix('services')->group(function () {

        Route::get('example1', function () {
            // fetch things out of container
            dd(app('example1'), app('example1'));
        });

        Route::get('example2', function () {
            dd(app('example2'), app('example2'));
        });

        Route::get('example3', function () {
            /**
             * laravel will first try to fetch from service container,
             * second will try fetch from class,
             * otherwise it will fail to error.
             */
            dd(app('App\Tutorial\Project'));
        });

        Route::get('example4', function () {
            /**
             * if there was a class, and it need to instance other class,
             * laravel still will try to instance that.
             */
            dd(app('App\Tutorial\Example'));
        });

        Route::get('example5', 'Tutorial\ExampleServicesController@show');

        Route::get('example6', 'Tutorial\ExampleServicesController@show2');

        Route::get('example7', 'Tutorial\ExampleServicesController@show3');

    });

    Route::prefix('providers')->group(function () {

        Route::get('example1', function () {
            dd(app('foo'));
        });

        Route::get('example2', function (\App\Services\Example7 $example7) {
            dd($example7);
        });

        Route::get('example3', function (\App\Repositories\UserRepository $userRepository) {
            dd($userRepository);
        });

    });

    Route::prefix('configurations')->group(function () {

        Route::get('example1', function (\App\Services\Example8 $example8) {
            dd($example8);
        });

        Route::get('example2', function (\App\Services\Example9 $example9) {
            dd($example9);
        });

        Route::get('example3', function () {
            return config('sample.none.greeting');
        });

    });

    Route::prefix('authenticate')->group(function () {

        Route::get('example1', 'HomeController@welcome')->middleware('auth');
        Route::get('example2', function () {
            return view('welcome');
        })->middleware('guest'); // at 5.7 seems if user has logged in then it will return 404.

    });

    Route::prefix('fireNotify')->group(function () {
        Route::get('/', function () {
            $user = App\User::first();

            $user->notify(new \App\Notifications\Tutorial\SubscriptionRenewalFailed);
            return 'Done';
        });
    });

    Route::prefix('collection')->group(function () {
        Route::get('example', 'Tutorial\CollectionsController@example');
    });

    Route::prefix('session')->group(function () {
        Route::get('write', 'Tutorial\SessionsController@write');
        Route::get('read', 'Tutorial\SessionsController@read');
        Route::get('writeFlash', 'Tutorial\SessionsController@writeFlash');
    });

    Route::prefix('tests')->group(function () {
        Route::post('teams', function () {
            $validated = request()->validate(['name' => 'required']);
            // $validated['user_id'] = auth()->id();
            // \App\Tutorial\Team::create($validated);
            auth()->user()->team()->create($validated);
            return redirect(url('/'));
        })->middleware('auth')->name('teams.store');
        Route::get('teams', function () {
            return view('test');
        })->middleware('auth');
    });

    Route::post('uploadsHandler', function () {
        $request = request(); // instance a request object
        // let us assume your upload file has name attribute with 'tstFile'
        if ($request->hasFile('tstFile')) { // if has file then...
            $file = $request->file('tstFile');  // instance a file object
            if ($file->isValid()) { // test whether file valid
                $filename = $file->getClientOriginalName(); // file's original name
                $extension = $file->getClientOriginalExtension(); // file's extension
                $filename = $filename . time() . "." . $extension; // setup the new file name for move action
                $file->move('uploads/tst', $filename); // move to 'uploads/tst' directory with new filename
            }
            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // fetch original name only
        }
    });

    Route::prefix('vue-1.0')->group(function () {
        Route::get('/', 'VueTutorial\BasicController@TutorialsV1');
        Route::get('{section}', 'VueTutorial\BasicController@TutorialsV1')->name('vue.section');
        Route::get('api/tasks', 'VueTutorial\BasicController@apiTasks')->name('vue.api.tasks');
        Route::get('api/tasks/{task}', 'VueTutorial\BasicController@apiTasksShow')->name('vue.api.tasks.show');
        Route::get('api/coupons/{code}', 'VueTutorial\BasicController@coupons')->name('vue.api.coupons');
        Route::delete('api/posts/{post}', function ($post) {
            return response()->json([
                'message' => 'post: ' . $post . ' has been deleted.'
            ]);
        })->name('vue.api.delete');
    });
});

Route::get('/clear-cache-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect('/');
});

Route::prefix('MultiAuth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'MultiAuth\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'MultiAuth\Auth\LoginController@login')->name('admin.login.submit');
        Route::post('/logout', 'MultiAuth\Auth\LoginController@logout')->name('admin.logout');
        Route::get('/register', 'MultiAuth\Auth\RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('/register', 'MultiAuth\Auth\RegisterController@register')->name('admin.register.submit');
        Route::get('/', 'MultiAuth\AdminController@index')->name('admin.home');
    });
});

Route::prefix('NgTest')->group(function () {
    Route::resource('NgProject', 'NgTest\NgProjectsController');
    Route::get('/{any}', function ($any) {
        return view('NgTest.index');
    })->where('any', '.*');
});
