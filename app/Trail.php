<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

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
