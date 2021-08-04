<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        
        foreach ($posts as $post) {
            if ($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            } else {
                $post->cover = url('images/placeholder.png');
            }
        }

        $result = [
            'success' => true,
            'posts' => $posts
        ];

        return response()->json($result);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        if (!empty($post)) {
            if ($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            } else {
                $post->cover = url('images/placeholder.png');
            }
        }

        return response()->json($post);
    }
}
