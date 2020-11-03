<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'match_date', 'sport_id', 'rival_university', 'score', 'result', 'votes_in_favor', 'votes_against',
    ];
}
