@extends('layouts.app')

@section('title', 'WordPress | Crea Post')

@section('content')
    <section>
        <div class="container">
            <h1 class="title text-center mb-5">Crea Post</h1>
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                {{-- TITLE --}}
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Inserisci Titolo" value="{{ old('title') }}">
                    @error('title')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /TITLE --}}

                {{-- CATEGORY --}}
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Titolo</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                        <option value="">-- Seleziona Categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id')? 'selected':'' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /CATEGORY --}}

                {{-- TAGS --}}
                <div class="form-group my-4">
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked':'' }}>
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
                <div class="form-group mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="7" placeholder="Inserisci Descrizione">{{ old('content') }}</textarea>
                    @error('content')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /CONTENT --}}

                {{-- FILE --}}
                <div class="form-group mb-3">
                    <label for="cover">Immagine di copertina</label>
                    <input type="file" name="cover" id="cover" class="form-control-file">
                    @error('cover')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- /FILE --}}

                {{-- BUTTONS --}}
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Lista Post</a>
                {{-- BUTTONS --}}
            </form>
        </div>
    </section> 
@endsection