<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Trail;
use trailBuddy\Comment;
use trailBuddy\Pic;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trails = Trail::all();
        foreach($trails as $trail)
        {
            if($trail->pet_friendly == 1)
            {
                $trail -> pet_friendly = "YES";
            }
            else
            {
                $trail -> pet_friendly = "NO";
            }
        }
        return view('trails.index', compact('trails'));
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
            'pet_friendly'=> 'required'
        ]);
        $pet = 0;
        if($request->get('pet_friendly') == "yes"){
            $pet = 1;
        }
         $trail = new Trail([
            'name' => $request->get('name'),
            'elevation'=> $request->get('elevation'),
            'distance'=> $request->get('distance'),
            'duration'=> $request->get('duration'),
            'difficulty'=> $request->get('difficulty'),
            'pet_friendly'=> $pet
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
        $trail = Trail::find($id);
        if($trail->pet_friendly == 1)
        {
            $trail -> pet_friendly = "YES";
        }
        else
        {
            $trail -> pet_friendly = "NO";
        }
        $comments = Comment::all()->where('trailId', $id);
        return view('trails.show', compact('trail', 'comments'));
    }
    
    public function photos($id)
    {
        $trail = Trail::find($id);
        $pics = Pic::all()->where('trailId', $id);
        return view('trails.photos', compact('trail', 'pics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trail = Trail::find($id);
        
        return view('trails.edit', compact('trail'));
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
            'name'=>'required',
            'elevation'=> 'required|integer',
            'distance' => 'required|integer',
            'duration'=> 'required|integer',
            'difficulty'=> 'required|string',
            'pet_friendly'=> 'required'
        ]);
        $pet = 0;
        if($request->get('pet_friendly') == "yes"){
            $pet = 1;
        }
        $trail = Trail::find($id);
        $trail->name = $request->get('name');
        $trail->elevation = $request->get('elevation');
        $trail->distance = $request->get('distance');
        $trail->duration = $request->get('duration');
        $trail->difficulty = $request->get('difficulty');
        $trail->pet_friendly = $pet;
        $trail->save();
        
        return redirect('/trails')->with('success', 'Trail has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trail = Trail::find($id);
        $trail->delete();
        
        return redirect('trails')->with('success', 'Trail has been successfully deleted');
    }
}
