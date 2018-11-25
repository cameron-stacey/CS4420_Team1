<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Comment;
use trailBuddy\Trail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
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
            'name'=>'required'
    ]);
         $comment = new Comment([
             'trailId' => $request->get('trailId'),
             'name' => $request->get('name')
    ]);
        $comment->save();
        return redirect('/comments')->with('success', 'Comment has been added');
    }
    
    public function trail_create($id)
    {
        $trail = Trail::find($id);
        return view('comments.trail', compact('trail'));
    }
    
    public function upload(Request $request, $id)
    {
        $request->validate([
            'comment'=>'required'
        ]);
    
        $comment = new Comment([]);
        $comment->trail()->associate($id);
        $comment->comment = $request->get('comment');
        $comment->save();
        
        return redirect('/trails')->with('success', 'Comment has been added');
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
        $comment = Comment::find($id);
        
        return view('comments.edit', compact('comment'));
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
            'name'=>'required'
        ]);
        
        $comment = Comment::find($id);
        $comment->name = $request->get('trailId');
        $comment->name = $request->get('name');
        $comment->save();
        
        return redirect('/comments')->with('success', 'Comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        
        return redirect('comments')->with('success', 'Comment has been successfully deleted');
    }
}
