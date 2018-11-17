<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'trailID',
        'comment'
    ];
}
