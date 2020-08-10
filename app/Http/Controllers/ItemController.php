<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->get();
        return view('projects.index', compact('projects'));
    }

    public function proyek() {
        return view('projects.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $project = DB::table('projects')->insert([
            'name' => $request['name'],
            'description' => $request['desccription'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        ]);

        return redirect('/proyek')->with('status', 'Add data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $project = DB::table('projects')
              ->where('id', $id)
              ->update([
                'name' => $request['name'],
                'description' => $request['desccription'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date']
                ]);

        return redirect('/proyek')->with('status', 'Update project success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = DB::table('projects')
                ->where('id', $id)
                ->delete();

        return redirect('/proyek')->with('status', 'Delete project success!');
    }
}