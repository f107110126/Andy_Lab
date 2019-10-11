<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('Tutorial/welcome')
            ->with('IsFromController', true);
    }

    public function about()
    {
        return view('Tutorial/about')
            ->with('IsFromController', true);
    }

    public function contact()
    {
        return view('Tutorial/contact')
            ->with('IsFromController', true);
    }
}
