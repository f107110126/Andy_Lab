<?php

namespace App\Tutorial;

//use App\Mail\ProjectCreated;
use App\Events\Tutorial\ProjectCreated;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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

    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];

//    public static function boot()
//    {
//        parent::boot();
//
//        /**
//         * about the other events referents: google 'eloquent event'
//         */
//
//        static::created(function ($project) {
//            Mail::to($project->owner->email)->send(
//                new ProjectCreated($project)
//            );
//        });
//    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

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
