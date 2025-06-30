<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
    <i class="fas fa-book-open"></i> Biblioteca Digitale
</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.index') }}">
                                    <i class="fas fa-book"></i> Catalogo Libri
                                </a>
                            </li>

                            {{-- LINK PRENOTAZIONI PER UTENTI NORMALI --}}
                            @if (!auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('books.my-reservations') }}">
                                        <i class="fas fa-calendar-check"></i> Le Mie Prenotazioni
                                        @if(auth()->user()->reservations()->where('status', 'attiva')->count() > 0)
                                            <span class="badge bg-warning text-dark ms-1">
                                                {{ auth()->user()->reservations()->where('status', 'attiva')->count() }}
                                            </span>
                                        @endif
                                    </a>
                                </li>
                            @endif

                            {{-- DASHBOARD ADMIN --}}
                            @if (auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    {{-- BADGE PRENOTAZIONI NEL NOME UTENTE --}}
                                    @if (!auth()->user()->isAdmin() && auth()->user()->reservations()->where('status', 'attiva')->count() > 0)
                                        <span class="badge bg-warning text-dark ms-1">
                                            {{ auth()->user()->reservations()->where('status', 'attiva')->count() }}
                                        </span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- LINK PRENOTAZIONI NEL DROPDOWN PER UTENTI NORMALI --}}
                                    @if (!auth()->user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('books.my-reservations') }}">
                                            <i class="fas fa-calendar-check"></i> Le Mie Prenotazioni
                                            @if(auth()->user()->reservations()->where('status', 'attiva')->count() > 0)
                                                <span class="badge bg-warning text-dark ms-1">
                                                    {{ auth()->user()->reservations()->where('status', 'attiva')->count() }}
                                                </span>
                                            @endif
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
