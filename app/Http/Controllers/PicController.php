<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Pic;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = Pic::all();
        
        return view('pics.index', compact('pics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pics.create');
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
            'trailId'=>'required',
            'name'=>'required',
            'path'=>'required'
    ]);
         $pic = new Pic([
             'trailId' => $request->get('trailId'),
             'name' => $request->get('name'),
             'path' => $request->get('path')
    ]);
        $pic->save();
        return redirect('/pics')->with('success', 'Picture has been added');
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
        $pic = Pic::find($id);
        
        return view('pics.edit', compact('pic'));
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
            'trailId'=>'required',
            'name'=>'required',
            'path'=>'required'
        ]);
        
        $pic = Pic::find($id);
        $pic->trailId = $request->get('trailId');
        $pic->name = $request->get('name');
        $pic->path = $request->get('path');
        $pic->save();
        
        return redirect('/pics')->with('success', 'Picture has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pic = Pic::find($id);
        $pic->delete();
        
        return redirect('pics')->with('success', 'Picture has been successfully deleted');
    }
}
