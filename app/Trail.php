<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;
use trailBuddy\Pic;

class Trail extends Model
{
    public function pics()
    {
      return $this->hasMany(Pic::class);
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