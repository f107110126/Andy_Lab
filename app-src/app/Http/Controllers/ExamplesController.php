<?php

namespace App\Http\Controllers;

use App\Example2;
use App\Example3;

class ExamplesController extends Controller
{
    public function home1(Example2 $example)
    {
        ddd($example);
    }
    public function home2(Example3 $example)
    {
        ddd($example);
    }
}
