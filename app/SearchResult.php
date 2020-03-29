<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchResult extends Model
{
    
    protected $fillable = [
        'user_id',
        'longitude',
        'latitude',
        'keywords',
        'results',
    ];
}
