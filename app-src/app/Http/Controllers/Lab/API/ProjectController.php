<?php

namespace App\Http\Controllers\Lab\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutorial\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Project::all()->map->title;
        // for now on we expect user can only view its project.
        // $titles = Project::where('owner_id', auth()->id())->get()->map->title;
        // auth()->id(); // it will return user_id
        // auth()->user(); // it will return User
        // auth()->check(); // it will return boolean
        return response()->json($titles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
