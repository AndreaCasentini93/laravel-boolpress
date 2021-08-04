@extends('layouts.app')

@section('title', 'WordPress | Modifica Post')

@section('content')
    <section>
        <div class="container">
            <h1 class="title text-center mb-5">Modifica "<span class="text-primary">{{ $post->title }}</span>"</h1>
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- TITLE --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Inserisci Titolo" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /TITLE --}}

                {{-- CATEGORY --}}
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
                {{-- /CATEGORY --}}

                {{-- TAGS --}}
                <div class="my-4">
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            @if ($errors->any())
                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked':'' }}>
                            @else
                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ $post->tags->contains($tag->id)? 'checked':'' }}>
                            @endif
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                    @error('tags')
                        <div>
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>
                {{-- TAGS --}}

                {{-- CONTENT --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="7" placeholder="Inserisci Descrizione">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /CONTENT --}}

                {{-- FILE --}}
                <div class="form-group mb-3">
                    <label for="cover">Immagine di copertina</label> 
                    @if ($post->cover)
                        <div>
                            <img style="width: 150px; border-radius: 10px;" class="mb-3" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                            <input class="ml-2" type="checkbox" name="old-cover" id="old-cover" {{ $post->cover? 'checked':'' }}>
                            <label for="old-cover">Mantieni copertina</label>
                        </div>
                    @endif
                    <input type="file" name="cover" id="cover" class="form-control-file">
                    @error('cover')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /FILE --}}

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success">Visualizza</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Lista Post</a>
                {{-- /BUTTON --}}
            </form>
        </div>
    </section> 
@endsection