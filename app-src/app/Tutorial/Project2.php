<?php

namespace App\Tutorial;

use Illuminate\Database\Eloquent\Model;

class Project2 extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function task2s()
    {
        return $this->hasMany(Task2::class, 'project_id');
    }

    public function addTask($attributes)
    {
        return $this->task2s()->create($attributes);
    }
}
