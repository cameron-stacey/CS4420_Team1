<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;
use trailBuddy\Trail;

class Pic extends Model
{
    public function trail()
    {
        return $this->belongsTo(Trail::class, 'trailId');
    }
    protected $fillable = [
        'tailId',
        'name',
        'path'
    ];
}
