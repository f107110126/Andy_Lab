<?php

namespace App\Providers;

use App\Repositories\DbUserRepository;
use App\Repositories\UserRepository;
use App\Services\Example7;
use App\Services\Example8;
use App\Services\Example9;
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

        $this->app->singleton(Example8::class, function () {
            return new Example8(config('services.Sample.secret'));
        });

        $this->app->singleton(Example9::class, function () {
            return new Example9(config('services.Sample.secret2'));
        });
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
