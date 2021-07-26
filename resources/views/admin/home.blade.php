@extends('layouts.app')

@section('title', 'WordPress | Amministratore')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
    <section id="admin_home" class="container d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/anteprima-wordpress.png') }}" alt="Anteprima Wordpress">
    </section>
@endsection
