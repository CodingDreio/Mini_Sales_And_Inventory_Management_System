<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Prodigy Sales: Cashier</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login: Prodigy Sales</title>
        

        {{-- =================================================================== --}}
        {{-- Stylesheets --}}
        {{-- =================================================================== --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pos.css') }}">

        {{-- =================================================================== --}}
        {{-- Scripts --}}
        {{-- =================================================================== --}}
        <script src="{{ asset('js/v5.1.0_bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/font-awesome-all.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    </head>
    @if (request()->routeIs('cashier'))
        <body  class="log-in-background">
    @elseif (request()->routeIs('cashierNew'))
        <body>
    @endif
        
        {{-- =================================================================== --}}
        {{-- Navigation --}}
        {{-- =================================================================== --}}
        <nav class="prodigy-navbar">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo"><img src="{{ asset('images/prodigy_sales_white.svg') }}" class="prodigy-sales-icon">Prodigy Sales</label>
            <ul>
                @if (request()->routeIs('cashier'))
                    @if (Auth::user()->role == 1)
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Admin Dashboard</a></li>
                        <li style="border-right: 1px solid white;"></li>
                    @endif
                @endif

                @if (request()->routeIs('cashierNew'))
                    {{-- <li><a href="{{ route('cashier') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
                    <li style="border-right: 1px solid white;"></li> --}}
                @elseif (request()->routeIs('cashier_sales'))
                    <li><a href="{{ route('cashier') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
                    {{-- <li><a href="{{ route('cashier_sales', ['id' => 2]) }}"><i class="fa fa-chart-bar"></i>&nbsp;&nbsp;Profile</a></li> --}}
                    <li style="border-right: 1px solid white;"></li>
                @endif
                @if (!request()->routeIs('cashierNew'))
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endif
            </ul>
        </nav>
        
        
        {{-- =================================================================== --}}
        {{-- Content --}}
        {{-- =================================================================== --}}
        <main class="py-4">
            @yield('content')
        </main>

    </body>
</html>