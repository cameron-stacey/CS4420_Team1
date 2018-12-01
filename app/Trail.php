<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;
use trailBuddy\Pic;
use trailBuddy\Comment;

class Trail extends Model
{
    public function pics()
    {
      return $this->hasMany(Pic::class);
    }
    
    public function comment()
    {
      return $this->hasMany(Comment::class);
    }
    
    public function city()
    {
        return $this->belongsTo(Cities::class, 'cityId');
    }
    
    public function state()
    {
        return $this->belongsTo(State::class, 'stateId');
    }
    
    public function address()
    {
        return $this->belongsTo(Address::class, 'addressId');
    }
    
    protected $fillable = [
      'name',
      'cityId',
      'stateId',
      'addressId',
      'elevation',
      'distance',
      'duration',
      'difficulty',
      'pet_friendly'
    ];
   
}