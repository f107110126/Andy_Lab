<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutorial\Project2;

class Project2sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project2::all();
        return view('Tutorial.project2s.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tutorial.project2s.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
        ]);
        // $validated['owner_id'] = auth()->id();
        // Project2::create($validated + ['owner_id' => auth()->id()]);
        Project2::create($validated);
        return redirect()->route('project2s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Tutorial\Project2 $project2
     * @return \Illuminate\Http\Response
     */
    public function show(Project2 $project2)
    {
        return view('Tutorial.project2s.show', compact('project2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Tutorial\Project2 $project2
     * @return \Illuminate\Http\Response
     */
    public function edit(Project2 $project2)
    {
        return view('Tutorial.project2s.edit', compact('project2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tutorial\Project2 $project2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project2 $project2)
    {
        $project2->update($request->validate([
            'title' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('project2s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tutorial\Project2 $project2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project2 $project2)
    {
        $project2->delete();
        return redirect()->route('project2s.index');
    }
}
