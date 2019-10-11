<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Tutorial\Project;
use App\Tutorial\Task;
use Illuminate\Http\Request;

class CompletedTasksController extends Controller
{
    public function store(Project $project,Task $task)
    {
        $task->complete();
        return back();
    }

    public function destroy(Project $project,Task $task)
    {
        $task->incomplete();
        return back();
    }
}
