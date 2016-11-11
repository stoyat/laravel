<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
