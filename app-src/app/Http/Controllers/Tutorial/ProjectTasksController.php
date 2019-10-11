<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutorial\Project;
use App\Tutorial\Task;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required|min:3']);
        $project->addTask($attributes);
        // $project->addTask(request()->description);
        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request()->description
        // ]);
        return back();
    }

    public function update(Project $project, Task $task)
    {

        /**
         * not good enough encapsulation
         * $task->update([
         *     'completed' => request()->has('completed')
         * ]);
         *
         * better one is:
         * $task->complete(request()->has('completed'));
         *
         * more better is:
         * if (request()->has('completed') {
         *     $task->complete();
         * } else {
         *     $task->incomplete();
         * }
         *
         * clear one is:
         * request()->has('completed') ? $task->complete() : $task->incomplete();
         *
         * more clear one is:
         * $method = request()->has('completed') ? 'complete' : 'incomplete';
         * $task->$method();
         *
         * more better we should not work with task at here.
         */
        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();
        return back();
    }
}
