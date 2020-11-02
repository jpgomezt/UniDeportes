<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title', 'sport_id_tag', 'writer', 'content',
    ];
}
