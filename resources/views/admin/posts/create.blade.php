@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center mb-5">Crea Post</h1>
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Inserisci Titolo" value="{{ old('title') }}">
                    @error('title')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Autore</label>
                    <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="author" aria-describedby="emailHelp" placeholder="Inserisci URL Immagine" value="{{ old('author') }}">
                    @error('author')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria</label>
                    <input name="category" type="text" class="form-control @error('category') is-invalid @enderror" id="category" aria-describedby="emailHelp" placeholder="Inserisci Serie" value="{{ old('category') }}">
                    @error('category')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="7" placeholder="Inserisci Descrizione">{{ old('content') }}</textarea>
                    @error('content')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Lista Post</a>
            </form>
        </div>
    </section> 
@endsection