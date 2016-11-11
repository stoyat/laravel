<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'year', 'author', 'genre'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
