<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Prediction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'match_id',
    ];
}
