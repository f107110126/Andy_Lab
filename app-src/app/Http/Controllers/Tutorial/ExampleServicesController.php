<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Services\Example7;
use App\Tutorial\Example5;
use Illuminate\Http\Request;

class ExampleServicesController extends Controller
{
    public function show(Example5 $example5)
    {
        dd(app('example5'));
    }

    public function show2()
    {
        dd(app('example7'));
    }

    public function show3(Example7 $example7)
    {
        dd($example7);
    }
}
