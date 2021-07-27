@extends('layouts.app')

@section('title', 'WordPress | ' . $post->title)

@section('content')
    <section>
        <div class="container">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="title text-center mb-5">{{ $post->title }}</h1>
            <br>
            <p>{{ $post->content }}</p>
            <br>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica Post</a>
                <a class="btn btn-success" href="{{ route('admin.posts.index') }}">Lista Post</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare il post \'{{ $post->title }}\'')" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Cancella Post">
                </form>
            </div>
        </div>
    </section> 
@endsection