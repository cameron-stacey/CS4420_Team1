<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Trail;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trails.create');
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
            'name'=>'required',
            'elevation'=> 'required|integer',
            'distance' => 'required|integer',
            'duration'=> 'required|integer',
            'difficulty'=> 'required|string',
            'pet_friendly'=> 'required|integer'
    ]);
         $trail = new Trail([
            'name' => $request->get('name'),
            'elevation'=> $request->get('elevation'),
            'distance'=> $request->get('distance'),
            'duration'=> $request->get('duration'),
            'difficulty'=> $request->get('difficulty'),
            'pet_friendly'=> $request->get('pet_friendly')
    ]);
        $trail->save();
        return redirect('/trails')->with('success', 'Trail has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
