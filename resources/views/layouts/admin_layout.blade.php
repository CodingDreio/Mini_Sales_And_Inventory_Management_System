<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodigy Sales: Administrator</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login: Prodigy Sales</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            <li><a class="active" href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Inventory</a></li>
            <li><a href="#">Sales</a></li>
            <li><a href="#">Account</a></li>
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