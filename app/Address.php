<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function trails()
    {
      return $this->hasMany(Trail::class);
    }
    
    protected $fillable = [
      'name'  
    ];
}
