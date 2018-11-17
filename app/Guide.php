<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'name',
        'url'
    ];
}
