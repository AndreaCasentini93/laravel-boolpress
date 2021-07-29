<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Fillable
    protected $fillable = [
        'name',
        'slug'
    ];

    //Relations
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
