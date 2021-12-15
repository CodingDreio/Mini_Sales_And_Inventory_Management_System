@extends('layouts.inventory_layout')
@section('content')
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1 class="header-text">Stocks</h1>
        </div>
        <form action="{{route('search_stock')}}" method="GET">
            <div class="input-group mb-2">
                <input type="search" class="form-control search-bar" placeholder="Search" aria-label="Search" id="stock_search" name="stock_search"
                    aria-describedby="search-addon" />
                <button type="submit" class="search-button px-4" onclick="location.href = 'inventory/search_stock';">search</button>
            </div>
        </form>
        <div class="row product-card-view d-flex justify-content-center">
            @foreach($product as $prod)
                <div class="col-md-4 col-sm-6 col-9">
                    <div class="product-card mb-3">
                        <img src="{{$prod -> photo}}" class="product-card-img w-100 p-2">
                        <div class="px-2"> 
                            <h5 class="product-card-title">{{$prod -> product_name}}</h5>
                            <p class="product-card-quantity">Stock: {{$prod -> quantity}}</p>
                            <div class="d-md-flex justify-content-md-between justify-content-center pb-2">
                                <button type="button" class="secondary-button px-3 w-100 me-1 mb-md-0 mb-1" onclick="location.href = 'inventory/pull_out/{{$prod -> product_id}}';">Pull out</button>
                                <button type="button" class="primary-button px-3 w-100" onclick="location.href = 'inventory/stock_in/{{$prod -> product_id}}';">Stock in</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection