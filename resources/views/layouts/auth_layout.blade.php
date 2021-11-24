<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login: Prodigy Sales</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
</head>
<body>
    
    {{-- =================================================================== --}}
    {{-- Navbar --}}
    {{-- =================================================================== --}}
    <nav class="prodigy-navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="{{ asset('images/prodigy_sales_white.svg') }}" class="prodigy-sales-icon">Prodigy Sales</label>
        
        <ul>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                {{-- @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
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
                </li> --}}
            @endguest
        </ul>
    
    </nav>

    {{-- =================================================================== --}}
    {{-- Content --}}
    {{-- =================================================================== --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- =================================================================== --}}
    {{-- Scripts --}}
    {{-- =================================================================== --}}
    <script src="{{ asset('js/v5.1.0_bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/font-awesome-all.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</body>
</html>