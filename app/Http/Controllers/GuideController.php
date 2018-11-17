<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Guide;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::all();
        
        return view('guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guides.create');
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
            'url'=>'required'
    ]);
         $guide = new Guide([
             'name' => $request->get('name'),
             'url' => $request->get('url')
    ]);
        $guide->save();
        return redirect('/guides')->with('success', 'Guide has been added');
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
        $guide = Guide::find($id);
        
        return view('guides.edit', compact('guide'));
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
            'url'=>'required'
    ]);
        
        $guide = Guide::find($id);
        $guide->name = $request->get('name');
        $guide->url = $request->get('url');
        $guide->save();
        
        return redirect('/guides')->with('success', 'Guide has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = Guide::find($id);
        $guide->delete();
        
        return redirect('guides')->with('success', 'Guide has been successfully deleted');
    }
}
