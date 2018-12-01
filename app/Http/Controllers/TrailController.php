<?php

namespace trailBuddy\Http\Controllers;

use Illuminate\Http\Request;
use trailBuddy\Trail;
use trailBuddy\Comment;
use trailBuddy\Pic;
use trailBuddy\Cities;
use trailBuddy\State;
use trailBuddy\Address;

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
        $states = State::pluck('name');
        $cities = Cities::pluck('name');
        $addresses = Address::pluck('address');
        
        return view('trails.create', compact('states','cities','addresses'));
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
            'name'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'elevation'=> 'required|integer',
            'distance' => 'required|integer',
            'duration'=> 'required|integer',
            'difficulty'=> 'required|string',
            'pet_friendly'=> 'required'
        ]);
        $city = Cities::where('name', $request->get('city'))->pluck('id');
        $state = State::where('name', $request->get('state'))->pluck('id');
        $addresses = Address::where('address', $request->get('address'))->pluck('id');
        $addressId = $addresses[0];
        
        $pet = 0;
        if($request->get('pet_friendly') == "yes"){
            $pet = 1;
        }
        
        $trail = new Trail([]);
        $trail->name = $request->get('name');
        $trail->city()->associate($city[0]);
        $trail->state()->associate($state[0]);
        $trail->address()->associate($addressId);
        $trail->elevation = $request->get('elevation');
        $trail->distance = $request->get('distance');
        $trail->duration = $request->get('duration');
        $trail->difficulty = $request->get('difficulty');
        $trail->pet_friendly = $pet;
        
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
        $states = State::pluck('name');
        $cities = Cities::pluck('name');
        $addresses = Address::pluck('address');
        
        return view('trails.edit', compact('trail','states','cities','addresses'));
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
            'city'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'elevation'=> 'required|integer',
            'distance' => 'required|integer',
            'duration'=> 'required|integer',
            'difficulty'=> 'required|string',
            'pet_friendly'=> 'required'
        ]);
        
        $city = Cities::where('name', $request->get('city'))->pluck('id');
        $state = State::where('name', $request->get('state'))->pluck('id');
        $addresses = Address::where('address', $request->get('address'))->pluck('id');
        $address = $addresses[0];
        
        $pet = 0;
        if($request->get('pet_friendly') == "yes"){
            $pet = 1;
        }
        $trail = Trail::find($id);
        $trail->name = $request->get('name');
        $trail->city()->associate($city[0]);
        $trail->state()->associate($state[0]);
        $trail->address()->associate($address);
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
