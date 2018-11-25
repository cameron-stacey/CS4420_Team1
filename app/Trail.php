<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;
use trail_buddy\app\Comment;

class Trail extends Model
{
    protected $fillable = [
      'name',
      'elevation',
      'distance',
      'duration',
      'difficulty',
      'pet_friendly'
    ];
   
}