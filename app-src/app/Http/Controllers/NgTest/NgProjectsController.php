<?php

namespace App\Http\Controllers\NgTest;

use App\Http\Controllers\Controller;
use App\NgTest\NgProject;
use Illuminate\Http\Request;

class NgProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(NgProject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NgTest.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NgProject::create($this->validator($request));
        return response()->json(['status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\NgTest\NgProject $ngProject
     * @return \Illuminate\Http\Response
     */
    public function show(NgProject $ngProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\NgTest\NgProject $ngProject
     * @return \Illuminate\Http\Response
     */
    public function edit(NgProject $ngProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\NgTest\NgProject $ngProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NgProject $ngProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\NgTest\NgProject $ngProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(NgProject $ngProject)
    {
        //
    }

    protected function validator(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }
}
