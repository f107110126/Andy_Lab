<?php

namespace App\Tutorial;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * // if defined like following, it means column 'title' and 'description' could be assume by array.
     * protected $fillable = [
     *     'title',
     *     'description'
     * ];
     *
     * // if defined like following, it means except column 'title' and 'description', others could assume by array.
     * protected $guarded = [
     *     'title',
     *     'description'
     * ];
     */
    public function tasks()
    {
        /**
         * two ways:
         * return $this->hasMany(Task::class);
         * return $this->hasMany('App\Tutorial\Task');
         */
        return $this->hasMany('App\Tutorial\Task');
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);
        /**
         * for argument is an array of attributes
         * we can use command:
         * return $this->tasks()->create($task);
         */
        /**
         * for argument is a string we called it 'description'
         * then we can use command:
         * return $this->tasks()->create(compact('description'));
         */
        // return Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
    }
}
