@extends('layouts.app')

@section('title', 'WordPress | Amministratore')

@section('content')
    <div id="dashboard" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="home" class="admin_home">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('img/anteprima-wordpress.png') }}" alt="">
                <h1>Il costruttore di siti più famoso al mondo.</h1>
                <p>Il 42% dei siti web usa la tecnologia WordPress. Blogger, piccole attività e grandi aziende nella lista Fortune 500 usano WordPress più di tutte le alternative messe insieme. Unisciti ai milioni di utenti che hanno scelto WordPress.com.</p>
            </div>
        </div>
    </section>
@endsection
