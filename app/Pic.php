<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = [
        'tailID',
        'file',
        'path'
    ];
}
