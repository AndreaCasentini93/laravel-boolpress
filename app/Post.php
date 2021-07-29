<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Fillable
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'content'
    ];

    // Relations
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
