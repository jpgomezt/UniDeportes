<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followed_Sport extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'followed_sport_id',
    ];
}
