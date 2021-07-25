@extends('layouts.app')

@section('title', 'WordPress | ' . $post->title)

@section('content')
    <section>
        <div class="container">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="title text-center mb-5">{{ $post->title }}</h1>
            <ul>
                <li><strong>Autore</strong>: {{ $post->author }}</li>
                <li><strong>Categoria</strong>: {{ $post->category }}</li>
            </ul>
            <p>{{ $post->content }}</p>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica Post</a>
                <a class="btn btn-success" href="{{ route('admin.posts.index') }}">Lista Post</a>
            </div>
        </div>
    </section> 
@endsection