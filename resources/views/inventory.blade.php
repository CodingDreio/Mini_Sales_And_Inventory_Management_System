@extends('layouts.inventory_layout')
@section('content')
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Products</h1>
            <button type="button" class="primary-button px-5" onclick="location.href = 'inventory/create';"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
        </div>
        <form action="{{route('inventory_search')}}" method="GET">
            <div class="input-group mb-2">
                <input type="search" class="form-control search-bar" placeholder="Search" aria-label="Search" id="product_search" name="product_search"
                    aria-describedby="search-addon" />
                <button type="submit" class="search-button px-4" onclick="location.href = 'inventory/search';">search</button>
            </div>
        </form>
        <div class="product-list">
            @foreach($product as $prod)
                <div class="product-row p-2 mb-1" onclick="location.href = 'inventory/show/{{$prod -> product_id}}';">
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="../{{$prod -> photo}}" class="product-pic rounded-circle me-3" onclick="showProduct($prod->product_id)">
                        <div class="product-name-price">
                            <p class="product-name">{{$prod -> product_name}}</p>
                            <p class="product-price">P{{$prod -> price}}</p>
                            <p class="product-quantity">Code: {{$prod -> code}}</p>
                        </div>
                        <div class="product-description me-3 w-100">
                        {{$prod -> product_description}}
                        </div>
                        <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon" onclick="showCRUD({{$prod -> product_id}})">
                    </div>
                    <div class="crud-div mt-2" id="display-crud-{{$prod -> product_id}}">
                        <button type="button" class="secondary-button px-3 ms-1 delete-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            if (confirm('Are you sure you want to delete?')) location.href = 'inventory/delete/{{$prod -> product_id}}';">
                        Delete</button>
                        <button type="button" class="primary-button px-3 ms-1 submit-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            location.href = 'inventory/edit/{{$prod -> product_id}}';">
                        Update</button>
                    </div>
                </div>
            @endforeach
            <!-- <div class="product-row p-2 mb-1">
                <div class="d-flex justify-content-around align-items-center">
                    <img src="images/asus-rog.jpg" class="product-pic rounded-circle me-3">
                    <div class="product-name-price">
                        <p class="product-name">Asus ROG 5</p>
                        <p class="product-price">P30,000</p>
                        <p class="product-quantity">Stock: 2,000</p>
                    </div>
                    <div class="product-description me-3">
                    Play to the max with ROG Phone 5, the gaming phone that takes no prisoners. Powered to win by the latest Qualcomm® Snapdragon™ 888 5G Mobile Platform, this futuristic wonder packs an unbelievably responsive 144 Hz / 1 ms display, a monster 6000 mAh1 battery system, massively upgraded AirTrigger 5 game controls, and our iconic GameFX audio system. ROG Phone 5 will take your gaming to a new dimension — if you dare.
                    </div>
                    <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon" onclick="showCRUD()">
                    <div class="product-checkbox"> 
                        <input class="form-check-input" type="checkbox">
                    </div>
                </div>
                <div class="crud-div mt-2" id="display-crud">
                    <button type="button" class="secondary-button px-3 ms-1">Delete</button>
                    <button type="button" class="primary-button px-3 ms-1">Update</button>
                </div>
            </div> -->
        </div>
    </div>
@endsection