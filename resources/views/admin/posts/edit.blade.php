@extends('layouts.app')

@section('title', 'WordPress | Modifica Post')

@section('content')
    <section>
        <div class="container">
            <h1 class="title text-center mb-5">Modifica "<span class="text-primary">{{ $post->title }}</span>"</h1>
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Inserisci Titolo" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Titolo</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                        <option value="">-- Seleziona Categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id)? 'selected':'' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="7" placeholder="Inserisci Descrizione">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success">Visualizza</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Lista Post</a>
            </form>
        </div>
    </section> 
@endsection