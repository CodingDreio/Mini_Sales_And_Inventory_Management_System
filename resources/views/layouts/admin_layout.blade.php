<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodigy Sales: Administrator</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin: Prodigy Sales</title>
    
    {{-- =================================================================== --}}
    {{-- Stylesheets --}}
    {{-- =================================================================== --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- =================================================================== --}}
    {{-- Scripts --}}
    {{-- =================================================================== --}}
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
            @if (request()->routeIs('admin'))
                <li><a class="active" href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            @else
                <li><a class="" href="{{ route('home') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            @endif
            <li><a href="{{ route('inventory') }}"><i class="fa fa-warehouse"></i>&nbsp;&nbsp;Inventory</a></li>
            <li><a href="{{ route('stock') }}"><i class="fa fa-chart-bar"></i>&nbsp;&nbsp;Sales</a></li>
            <li><a href="{{ route('cashier') }}"><i class="fa fa-window-maximize"></i>&nbsp;&nbsp;POS</a></li>
            
            @if (request()->routeIs('admin_viewUsers'))
                <li><a class="active" href="{{ route('admin_viewUsers') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;Users</a></li>
            @else
                <li><a href="{{ route('admin_viewUsers') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;Users</a></li>
            @endif
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