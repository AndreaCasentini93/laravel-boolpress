@extends('layouts.app')

@section('title', 'Errore 404 | Not Found')

@section('content')
    <section id="error_404">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>Errore 404</h1>
            <h3>Oooops... La pagina non è stata trovata.</h3>
            <a href="{{ route('admin.home') }}" class="btn btn-success">Torna alla Home</a>
        </div>
    </section>
@endsection