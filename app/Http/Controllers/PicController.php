<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use trailBuddy\Pic;
use trailBuddy\Trail;

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
        $destinationPath = public_path('/storage');
        $image->move($destinationPath, $fileName);
        //Storage::putFileAs('public', $image, $fileName);
        $path = "/storage/" . $fileName;
        $pic = new Pic([
            'name' => $fileName,
            'path' => $path
    ]);
        $pic->save();
        return redirect('/pics')->with('success', 'Picture has been added');
    }
    
    public function trail_create($id)
    {
        $trail = Trail::find($id);
        return view('pics.trail', compact('trail'));
    }
    
    public function upload(Request $request, $id)
    {
        $request->validate([
            'image'=>'required|image'
        ]);
        
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $destinationPath = public_path('/storage');
        $path = "/storage/" . $fileName;
        
        $pic = new Pic([]);
        $pic->trail()->associate($id);
        $pic->name = $fileName;
        $pic->path = $path;
        
        $pic->save();
        $image->move($destinationPath, $fileName);
        return redirect('/trails')->with('success', 'Picture has been added');
        
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
        $path = public_path('/storage/').$pic['name'];
        if(file_exists($path)){
            unlink($path);
            $pic->delete();
            return redirect('pics')->with('success', 'Picture has been successfully deleted');
        }
        else{
            return redirect('pics')->with('failure', 'Picture was not deleted');
        }
    }
}
