<?php

namespace App\Tutorial;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];
}
