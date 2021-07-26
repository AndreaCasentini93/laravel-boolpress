<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Post;

class PostController extends Controller
{
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
        $request->request->add(['slug' => Str::slug($request->title . ' ' . $request->author)]);
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|unique:posts',
                'author' => 'required|max:255',
                'category' => 'required|max:255',
                'content' => 'required',
            ],
            [
                'required' => 'Il campo è obbligatorio!',
                'unique' => 'Questo accoppiamento titolo-autore è già stato utilizzato',
                'max' => 'Il campo contiene un numero di caratteri superiore al limite consentito di 255'
            ]
        );
        
        $post = new Post();
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
        $request->request->add(['slug' => Str::slug($request->title . ' ' . $request->author)]);
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => [
                    'required',
                    Rule::unique('posts')->ignore($post->id)
                ],
                'author' => 'required|max:255',
                'category' => 'required|max:255',
                'content' => 'required',
            ],
            [
                'required' => 'Il campo è obbligatorio!',
                'unique' => 'Questo accoppiamento titolo-autore è già stato utilizzato',
                'max' => 'Il campo contiene un numero di caratteri superiore al limite consentito di 255'
            ]
        );
        
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
