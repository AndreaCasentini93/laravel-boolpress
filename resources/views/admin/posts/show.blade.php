@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center mb-5">{{ $post->title }}</h1>
            <ul>
                <li><strong>Autore</strong>: {{ $post->author }}</li>
                <li><strong>Categoria</strong>: {{ $post->category }}</li>
            </ul>
            <p>{{ $post->content }}</p>
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('admin.posts.index') }}">Lista Post</a>
            </div>
        </div>
    </section> 
@endsection