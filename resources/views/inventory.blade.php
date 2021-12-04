@extends('layouts.inventory_layout')
@section('content')
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Sales and Inventory</h1>
            <button type="button" class="primary-button px-5">Add</button>
        </div>
        <div class="input-group mb-2">
            <input type="search" class="form-control search-bar" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <button type="button" class="search-button px-4">search</button>
        </div>
        <div class="product-list">
            @foreach($product as $prod)
                <div class="product-row p-2 mb-1">
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="{{$prod -> photo}}" class="product-pic rounded-circle me-3">
                        <div class="product-name-price">
                            <p class="product-name">{{$prod -> product_name}}</p>
                            <p class="product-price">P{{$prod -> price}}</p>
                            <p class="product-quantity">Stock: {{$prod -> quantity}}</p>
                        </div>
                        <div class="product-description me-3">
                        {{$prod -> product_description}}
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
            <div class="product-row p-2 mb-1 d-flex justify-content-around align-items-center">
                <img src="images/asus-rog.jpg" class="product-pic rounded-circle me-3">
                <div class="product-name-price">
                    <p class="product-name">Asus ROG 5</p>
                    <p class="product-price">P30,000</p>
                    <p class="product-quantity">Stock: 2,000</p>
                </div>
                <div class="product-description me-3">
                Play to the max with ROG Phone 5, the gaming phone that takes no prisoners. Powered to win by the latest Qualcomm® Snapdragon™ 888 5G Mobile Platform, this futuristic wonder packs an unbelievably responsive 144 Hz / 1 ms display, a monster 6000 mAh1 battery system, massively upgraded AirTrigger 5 game controls, and our iconic GameFX audio system. ROG Phone 5 will take your gaming to a new dimension — if you dare.
                </div>
                <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon">
                <div class="product-checkbox"> 
                    <input class="form-check-input" type="checkbox">
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mt-2">
            <div class="select-multiple-blue p-2 me-2">
                <input class="form-check-input" type="checkbox" onclick="terms_changed(this)" class="select-multiple-check">
                <label class="form-check-label" for="select-multiple">
                    Select Multiple
                </label>
            </div>
            <button type="button" id="select-multiple" class="secondary-button px-2 mb-2 mt-2" disabled style="filter: opacity(50%)">Delete</button>
        </div>
    </div>
@endsection