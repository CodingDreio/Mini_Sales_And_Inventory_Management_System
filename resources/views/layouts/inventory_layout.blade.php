<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodigy Sales: Inventory</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <script src="{{ asset('js/v5.1.0_bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/font-awesome-all.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
    
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
            @if (Auth::user()->role == 1)
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Admin Dashboard</a>
                </li>
                <li style="border-right: 1px solid white;"></li>
            @endif
            <li>
                <a href="{{ route('inventory') }}"><i class="fa fa-hamburger"></i>&nbsp;&nbsp;Products</a>
            </li>
            <li style="border-right: 1px solid white;"></li>
            <li>
                <a href="{{ route('stock') }}"><i class="fa fa-warehouse"></i>&nbsp;&nbsp;Stocks</a>
            </li>
            <li style="border-right: 1px solid white;"></li>
            <li>
                <a href="{{ route('inventory_sales') }}"><i class="fa fa-chart-bar"></i>&nbsp;&nbsp;Sales</a>
            </li>
            <li style="border-right: 1px solid white;"></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
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