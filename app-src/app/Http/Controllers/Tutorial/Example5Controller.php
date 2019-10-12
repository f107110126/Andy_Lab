<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Tutorial\Example5;
use Illuminate\Http\Request;

class Example5Controller extends Controller
{
    public function show(Example5 $example5) {
        dd(app('example5'));
    }
}
