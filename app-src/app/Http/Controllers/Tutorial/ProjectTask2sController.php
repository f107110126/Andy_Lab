<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Tutorial\Project2;
use App\Tutorial\Task2;
use Illuminate\Http\Request;

class ProjectTask2sController extends Controller
{
    public function store(Project2 $project2)
    {
        $project2->addTask(request()->validate([
            'description' => 'required|min:3'
        ]));
        return back();
    }
}
