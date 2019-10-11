<?php

namespace App\Tutorial;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'description', 'completed'];

    /**
     * in tutorial this line should be:
     * protected $guarded = [];
     */

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function complete($completed = true)
    {
        /**
         * $this->update(['completed' => $completed]);
         * -->
         * $this->update(compact('completed'));
         */
        return $this->update(compact('completed'));
    }

    public function incomplete()
    {
        return $this->complete(false);
    }
}
