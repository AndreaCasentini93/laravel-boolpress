<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            {{-- HEADER --}}
            <header>
                <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('admin.home') }}">
                            <img src="{{ asset('img/logo-wordpress.png') }}" alt="Logo WordPress">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                
                            </ul>
    
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto d-flex align-items-center">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item {{ Route::currentRouteName() == 'login'? 'active':'' }}">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item {{ Route::currentRouteName() == 'register'? 'active':'' }}">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item {{ Route::currentRouteName() == 'admin.posts.index'? 'active':'' }}">
                                        <a class="nav-link" href="{{ route('admin.posts.index') }}">Elenco post</a>
                                    </li>
                                    <li class="nav-item {{ Route::currentRouteName() == 'admin.posts.create'? 'active':'' }}">
                                        <a class="nav-link" href="{{ route('admin.posts.create') }}">Crea post</a>
                                    </li>
                                    <li class="not_active nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    <li class="site nav-item d-flex align-items-center">
                                        <a class="online_site nav-link" href="{{ route('home') }}" target="_blank">Sito Online</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            {{-- /HEADER --}}

            {{-- MAIN --}}
            <main class="py-4">
                @yield('content')
            </main>
            {{-- /MAIN --}}
        </div>
    </body>
</html>
