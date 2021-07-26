<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Post;

class PostController extends Controller
{
    private $postValidationArray = [
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'category' => 'required|max:255',
        'content' => 'required',
    ];
    
    private $postValidationMessages = [
        'title.required' => 'Il titolo è un campo obbligatorio!',
        'title.max' => 'Il titolo non può contenere più di 255 caratteri!',
        'author.required' => 'L\'autore è un campo obbligatorio!',
        'author.max' => 'L\'autore non può contenere più di 255 caratteri!',
        'category.required' => 'La categoria è un campo obbligatorio!',
        'category.max' => 'La categoria non può contenere più di 255 caratteri!',
        'content.required' => 'Il contenuto è un campo obbligatorio!',
    ];

    private function generateSlug($data) {
        $slug = Str::slug($data['title'], '-');
        $existingInModel = Post::where('slug', $slug)->first();
        $counter = 1;

        while ($existingInModel) {
            $slug = Str::slug($data['title'], '-') . '-' . $counter;
            $existingInModel = Post::where('slug', $slug)->first();
            $counter++;
        }

        $data['slug'] = $slug;
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate(
            $this->postValidationArray,
            $this->postValidationMessages
        );

        $post = new Post();
        $data = $this->generateSlug($data);
        $post->fill($data);
        $post->save();
        return redirect()
            ->route('admin.posts.show', $post->id)
            ->with('message', 'Il post "' . addslashes($post->title) . '" è stato salvato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $request->validate(
            $this->postValidationArray,
            $this->postValidationMessages
        );

        if ($post->title != $data['title']) {
            $this->generateSlug($data);
        }
        
        $post->update($data);
        return redirect()
            ->route('admin.posts.show', $post->id)
            ->with('message', 'Il post "' . addslashes($post->title) . '" è stato modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('delete', 'Il post "' . addslashes($post->title) . '" è stato eliminato con successo!');
    }
}
