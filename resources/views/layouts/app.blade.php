<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="main-layout" class="d-flex flex-column flex-grow-1">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fs-4" href="{{ url('/') }}">
                    <i class="fas fa-book-open text-primary"></i> Biblioteca Digitale
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ps-4">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="{{ route('books.index') }}">
                                    <i class="fas fa-book"></i> Catalogo
                                </a>
                            </li>

                            @if (!auth()->user()->isAdmin())
                                <li class="nav-item ms-3">
                                    <a class="nav-link fs-5" href="{{ route('books.my-reservations') }}">
                                        <i class="fas fa-calendar-check"></i> Mie Prenotazioni
                                        @if(auth()->user()->reservations()->where('status', 'attiva')->count() > 0)
                                            <span class="badge bg-warning text-dark ms-1 rounded-pill">
                                                {{ auth()->user()->reservations()->where('status', 'attiva')->count() }}
                                            </span>
                                        @endif
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->isAdmin())
                                <li class="nav-item ms-3">
                                    <a class="nav-link fs-5 text-danger" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> Area Admin
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary ms-2" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold fs-5" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>

                               <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdown">
                                    {{-- Se l'utente NON è admin, vede le sue prenotazioni --}}
                                    @if (!auth()->user()->isAdmin())
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('books.my-reservations') }}">
                                                <i class="fas fa-calendar-check text-muted me-2"></i> Le Mie Prenotazioni
                                            </a>
                                        </li>
                                    {{-- Se l'utente È admin, vede i link di gestione --}}
                                    @else
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-tachometer-alt text-muted me-2"></i> Dashboard Admin
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('books.index') }}">
                                                <i class="fas fa-book text-muted me-2"></i> Torna al Catalogo
                                            </a>
                                        </li>
                                    @endif

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i> Esci
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5 flex-grow-1">
            <div id="app">
                @yield('content')
            </div>
        </main>

        <footer class="custom-footer text-center py-4 shadow-sm mt-auto border-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-md-start mb-3 mb-md-0">
                        <h5 class="fw-bold text-primary"><i class="fas fa-book-open"></i> Biblioteca Digitale</h5>
                        <p class="text-muted small mb-0">Il tuo portale per la lettura infinita, comodamente da casa tua.</p>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <p class="text-muted small mb-0 pt-3">
                            &copy; {{ date('Y') }} Baldesito tutti i diritti riservati.
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end pt-2">
                        <a href="https://www.linkedin.com/in/abdoulaye-balde-7571a8342/" target="blank" class="text-muted me-3 fs-5"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-3 fs-5"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-muted me-3 fs-5"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted fs-5"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
