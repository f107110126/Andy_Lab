<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForNexmo($notification)
    {
        return ''; //phone number registered at nexmo.com for test
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
        // "select * from articles where user_id = {$this->id};";
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // $user->roles->save($role);
    // $user->grantRole
    // $user->assignRole

    public function assignRole($roles)
    {
        // fool way
        // if (is_a($role, Collection::class)) {
        //     if (is_a($role->first(), Role::class)) {
        //         $this->roles()->saveMany($role);
        //         // this way may cause error during already exist pairing
        //     }
        // }
        // if (is_a($role, Role::class)) {
        //     $this->roles()->save($role);
        // }

        if (is_string($roles)) {
            $roles = Role::whereName($roles)->firstOrFail();
        }

        $this->roles()->sync($roles, false);
        // add false parameter for not detaching, same as
        // $this->roles()->syncWithoutDetaching($roles);
    }

    public function abilities()
    {
        // return $this->roles->map->abilities->flatten()->pluck('name')->unique();
        return $this->roles->map->abilities->flatten()->unique('id');
    }

    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    //     // "select * from projects where user_id = {$this->id};";
    // }
}

// $user = User::find(1); // select * from user where id = 1
// $user->projects; // select * from projects where user_id = $user->id
// $user->projects->split(3)
// $user->projects->groupBy
