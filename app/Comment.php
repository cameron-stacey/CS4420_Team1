<?php

namespace trailBuddy;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function trail()
    {
        return $this->belongsTo(Trail::class, 'trailId');
    }
    
    protected $fillable = [
        'trailID',
        'comment'
    ];
    
}