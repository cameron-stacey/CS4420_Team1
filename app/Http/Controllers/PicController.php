<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image'=>'required|image'
    ]);
        
        $image = $request->file('image');
        
        //$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       // $destinationPath = public_path('/storage');
        //$image->move($destinationPath, $input['imagename']);
        
        //$this->postImage->add($input);
        $fileName = $image->getClientOriginalName();
        
        $path = Storage::putFileAs('public', $image, $fileName);
        $pic = new Pic([
            'name' => $fileName,
            'path' => $path
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
            'name'=>'required'
        ]);
        
        $pic = Pic::find($id);
        $pic->name = $request->get('name');
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
        $fileName = $pic['path'];
        
        Storage::delete($fileName);
        $pic->delete();
        
        return redirect('pics')->with('success', 'Picture has been successfully deleted');
    }
}
