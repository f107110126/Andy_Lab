<?php

namespace App\Providers;

use App\Repositories\DbUserRepository;
use App\Repositories\UserRepository;
use App\Services\Example7;
use Illuminate\Support\ServiceProvider;

class SampleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('foo', function () {
            return 'bar';
        });

        $this->app->singleton(Example7::class, function () {
            return new Example7('this is from SampleProvider');
        });

        $this->app->bind(UserRepository::class, DbUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
