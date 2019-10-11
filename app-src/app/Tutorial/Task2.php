<?php

namespace App\Tutorial;

use Illuminate\Database\Eloquent\Model;

class Task2 extends Model
{
    protected $fillable = [
        'description', 'completed'
    ];

    public function project()
    {
        return $this->belongsTo(Project2::class);
    }

    public function complete($completed = true)
    {
        $rst =  $this->update([
            'completed' => $completed
        ]);
    }

    public function incomplete()
    {
        return $this->complete(false);
    }
}
