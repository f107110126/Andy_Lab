<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // same effective as coding in route/web.php
        // $this->app->bind('App\Example3', function () {
        //     $collaborator = new App\Collaborator();
        //     $foo = 'foobar'; // if not setup foo, will not auto-resolve
        //     return new App\Example3($collaborator, $foo);
        //     // for path 'p5';
        // });

        // not 'bind' but 'singletone' will make auto resolve only just onetime
        // and point to same object instance.
        // $this->app->singleton('App\Example3', function () {
        //     $collaborator = new App\Collaborator();
        //     $foo = 'foobar'; // if not setup foo, will not auto-resolve
        //     return new App\Example3($collaborator, $foo);
        //     // for path 'p5';
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
