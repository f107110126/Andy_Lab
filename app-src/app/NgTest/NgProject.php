<?php

namespace App\NgTest;

use Illuminate\Database\Eloquent\Model;

class NgProject extends Model
{
    protected $fillable = [
        'title', 'description'
    ];
}
