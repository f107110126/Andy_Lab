<?php

namespace App\Providers;

// use App\Conversation;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {
        //     // return true; // if a user has login it will be pass
        //     return $conversation->user->is($user);
        // });

        // Gate::before(function (User $user) {
        //     // it should before than policy
        //     if ($user->id === 6) {return true;}
        // });

        Gate::before(function (User $user, $ability) {
            // return $user->abilities()->pluck('name')->contains($ability);
            // better way
            if ($user->abilities()->pluck('name')->contains($ability)) {
                return true;
            }
        });
    }
}
