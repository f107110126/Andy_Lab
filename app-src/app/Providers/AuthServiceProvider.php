<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Tutorial\Project' => 'App\Policies\Tutorial\ProjectPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param Gate $gate
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        $gate->before(function ($user) {
            return $user->id === 1 ? true : null;
        });

        /**
         * if someone is administrator then return true for any policy
         * $gate->before(function($user) {
         *     return $user->id === 1; // for example admin's id is 1.
         * }
         * // as what i tried in laravel 6.1
         * // it will effect all situation, but not only admin.
         * // it means everyone will be deny unless admin.
         * // for use this syntax, gate should be instance from:
         * Illuminate\Contracts\Auth\Access\Gate::class.
         *
         * and method defined like this:
         * public function boot(Gate $gate) {...}
         */
    }
}
