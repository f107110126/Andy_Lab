<?php

namespace App;

use App\AuthAndPermission\Role;
use App\Tutorial\Project;
use App\Tutorial\Team;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function owns(Project $project)
    {
        return $project->owner_id === $this->id;
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }

    // based on collection, we can do this.
    public function isVerified()
    {
        return (bool)$this->email_verified_at;
    }

    // or this
    public function isNotVerified()
    {
        return (bool)!$this->email_verified_at;
    }

    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
