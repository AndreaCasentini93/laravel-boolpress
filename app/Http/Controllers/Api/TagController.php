<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($slug) {
        $tag = Tag::where('slug', $slug)->with(['posts'])->first();

        foreach ($tag->posts as $post) {
            if ($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            } else {
                $post->cover = url('images/placeholder.png');
            }
        }
        
        return response()->json($tag);
    }
}
