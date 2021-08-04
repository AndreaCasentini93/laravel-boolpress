<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    private $postValidationArray = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'nullable|exists:categories,id',
        'tags' => 'exists:tags,id',
        'cover' => 'nullable|mimes:jpg,jpeg,png,svg|max:2048'
    ];
    
    private $postValidationMessages = [
        'title.required' => 'Il titolo è un campo obbligatorio!',
        'title.max' => 'Il titolo non può contenere più di 255 caratteri!',
        'content.required' => 'Il contenuto è un campo obbligatorio!',
        'category_id.exists' => 'La categoria scelta è inesistente!',
        'tags.exists' => 'Il tag selezionato è inesistente!',
        'cover.mimes' => 'La copertina deve essere un file di tipo: jpg, jpeg, png, svg.',
        'cover.max' => 'La copertina deve avere una dimensione massima di 2048 KB'
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
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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

        if (array_key_exists('cover', $data)) {
            $data['cover'] = Storage::put('post_cover', $data['cover']);
        }

        $post->fill($data);
        $post->save();

        if (array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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

        if (!array_key_exists('old-cover', $data)) {
            $post->cover = null;
        }

        if (array_key_exists('cover', $data)) {
            if ($post->cover) {
                Storage::delete($post->cover);
            }
            $data['cover'] = Storage::put('post_cover', $data['cover']); 
        }
        
        $post->update($data);
        
        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

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
