<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Mail\ProjectCreated;
use Illuminate\Http\Request;
use App\Tutorial\Project;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
        // $this->middleware('auth')->only('index');
        // $this->middleware('auth')->only(['method1', 'method2', ...]);
        // $this->middleware('auth')->except('index');
        // $this->middleware('auth')->except(['method1', 'method2', ...]);
    }

    public function index()
    {
        // $projects = Project::all();
        // $projects = Project::where('owner_id', auth()->id())->get();
        // for now on we expect user can only view its project.
        // $titles = Project::where('owner_id', auth()->id())->get()->map->title;
        // auth()->id(); // it will return user_id
        // auth()->user(); // it will return User
        // auth()->check(); // it will return boolean
        /**
         * if you only need all title of projects, alternative way is:
         * $titles = Project::all()->map->title;
         * # result = ['title1', 'title2', ...]
         * or:
         * $titles = Project::select('title')->get();
         * # result = [
         *     obj1 = {
         *         title: 'title1'
         *     },
         *     obj2 = {
         *         title: 'title2'
         *     }
         * ]
         */
        /**
         * code used int tutorial episode 28
         * $projects = Project::where('owner_id', auth()->id())->take(2)->get();
         * dump($projects);
         * cache()->rememberForever('stats', function() {
         *     return [
         *         'lessons' => 1300,
         *         'hours' => 50000,
         *         'series' => 100
         *     ];
         * });
         * $stats = cache()->get('stats');
         * dump($stats);
         */
        // return view('Tutorial.projects.index', compact('projects'));
        return view('Tutorial.projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create()
    {
        return view('Tutorial.projects.create');
    }

    public function store()
    {
        /**
         * some other ways to access request
         * request(); // will return a Request object.
         * request()->all(); // will return all value of parameter no matter it parse by post or get.
         * request->post(); // will return a object with all parameters parse by post.
         * request->get('something'); // will return value of parameter called 'something' parse by get.
         * request('something'); // will return value of parameter called 'something' parse by post first then parse by get
         * request()->something; // will return value of parameter called 'something' parse by post first then parse by get
         * request(['title', 'description']); // will return value of parameter called 'title' and 'description' in array
         */
        /**
         * to validation data integrity
         * request()->validate([
         *     'title' => 'required',
         *     'description' => 'required'
         * ]);
         * i.g.
         * request()->validate([
         *     'name' => 'required', // it must given value without other rule.
         *     'password' => 'required|min:8', // it must given value with minimum length 8.
         *     // available validation rule reference: google 'laravel validation rule'
         *     // multiple rules can be express as 'rule1|rule2|...' or ['rule1', 'rule2',...]
         * ]);
         *
         * $validated = request()->validate(...);
         * // if validate result is pass then it will send same result as request()->all();
         */
        /**
         * some other ways to save a set of data
         * Project::create([
         *     'title' => request()->title,
         *     'description' => request()->description
         * ]);
         * or
         * Project::create(request()->all());
         * or
         * Project::create($validated);
         * // But above columns must be 'fillable' and it is defined in model.
         */
//        request()->validate([
//            'title' => ['required', 'min:3'],
//            'description' => 'required'
//        ]);
        $this->validateProject();
        $project = new Project();
        $project->owner_id = auth()->id();
        $project->title = request()->title;
        $project->description = request()->description;
        $project->save();

//        event(new ProjectCreated($project));

        // \Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );
        return redirect()->Route('Tutorial.projects.index');

        /**
         * some way for return not view but redirect.
         * redirect('something'); will direct redirect to the url science the project root.
         * redirect()->Route('something') will redirect to the url named 'something' defined in web.php .
         */
    }

    /**
     * public function show(Project $project) {}
     * is equal to:
     * public function show($id) {
     *     $project = Project::findorfail($id);
     * }
     */

    public function show(Project $project)
    {
        /**
         * to prevent the $id out of law
         * use method findorfail()
         */
        // $project = Project::find($id);
        // to verify user behavior these two command quietly have same result:
        // if ($project->owner_id !== auth()->id()) abort(403);
        // abort_if($project->owner_id !== auth()->id(), 403);
        // abort_if(!auth()->user()->owns($project), 403); // work if add 'owns' method in User::class
        // abort_unless(auth()->user()->owns($project), 403); // work if add 'owns' method in User::class
        // \Gate::allows
        // \Gate::denies

        /**
         * // need create policy and mapping it in AuthServiceProvider
         *
         * sample of authorize:
         * $this->authorize('view', $project);
         *
         * sample of Gate:
         * if (\Gate::denies('view', $project) {
         *     abort(403);
         * }
         *
         * sample of Gate:
         * abort_unless(\Gate::allows('view', $project), 403);
         *
         * auth()->user()->can('view', $project); // only return boolean, but not abort.
         * auth()->user()->cannot('view', $project); // only return boolean, but not abort.
         */

        $this->authorize('view', $project);


        return view('Tutorial.projects.show')->withProject($project);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('Tutorial.projects.edit', compact('project'));
    }

    public function update($id)
    {
        /**
         * some other ways to update project
         * $project->update(request(['title', 'description']));
         */
        $this->validateProject();
        $project = Project::find($id);
        $project->title = request()->title;
        $project->description = request()->description;
        $project->save();
        return redirect()->Route('Tutorial.projects.show', $id);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->Route('Tutorial.projects.index');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required|min:3'
        ]);
    }
}
