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
        'content',
        'cover'
    ];

    // EAGER LOADING su tutte le query
    // protected $with = [
    //     'category',
    //     'tags'
    // ];

    // Relations
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
