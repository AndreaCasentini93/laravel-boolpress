@extends('layouts.app')

@section('title', 'WordPress')

@section('content')
    <section id="home" class="guest_home">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('img/anteprima-wordpress.png') }}" alt="">
                <h1>Il costruttore di siti più famoso al mondo.</h1>
                <p>Il 42% dei siti web usa la tecnologia WordPress. Blogger, piccole attività e grandi aziende nella lista Fortune 500 usano WordPress più di tutte le alternative messe insieme. Unisciti ai milioni di utenti che hanno scelto WordPress.com.</p>
            </div>
        </div>
    </section>
@endsection