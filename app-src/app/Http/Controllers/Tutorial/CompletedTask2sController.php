<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Tutorial\Project2;
use App\Tutorial\Task2;
use Illuminate\Http\Request;

class CompletedTask2sController extends Controller
{
    public function store(Project2 $project2, Task2 $task2)
    {
        $task2->complete();
        return back();
    }

    public function destroy(Project2 $project2, Task2 $task2)
    {
        $task2->incomplete();
        return back();
    }
}
