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
    
    protected $fillable = [
      'name',
      'elevation',
      'distance',
      'duration',
      'difficulty',
      'pet_friendly'
    ];
   
}