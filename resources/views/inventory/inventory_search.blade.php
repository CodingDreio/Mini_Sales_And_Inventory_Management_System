@extends('layouts.inventory_layout')
@section('content')
    <script src="../js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Sales and Inventory</h1>
            <button type="button" class="primary-button px-5" onclick="location.href = '../inventory/create';">Add</button>
        </div>
        <div class="input-group mb-2">
            <input type="search" class="form-control search-bar" placeholder="Search" aria-label="Search" id="product_search" name="product_search"
                aria-describedby="search-addon" />
            <button type="button" class="search-button px-4" onclick="location.href = '../../inventory/search?product_search='+document.getElementById('product_search').value;">search</button>
        </div>
        <div class="product-list">
            @foreach($product as $prod)
                <div class="product-row p-2 mb-1">
                    <div class="d-flex justify-content-around align-items-center" onclick="location.href = '../inventory/show/{{$prod -> product_id}}';">
                        <img src="../{{$prod -> photo}}" class="product-pic rounded-circle me-3">
                        <div class="product-name-price">
                            <p class="product-name">{{$prod -> product_name}}</p>
                            <p class="product-price">P{{$prod -> price}}</p>
                            <p class="product-quantity">Stock: {{$prod -> quantity}}</p>
                        </div>
                        <div class="product-description me-3 w-100">
                        {{$prod -> product_description}}
                        </div>
                        <img src="../images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon" onclick="showCRUD({{$prod -> product_id}})">
                        <div class="product-checkbox"> 
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </div>
                    <div class="crud-div mt-2" id="display-crud-{{$prod -> product_id}}">
                        <button type="button" class="secondary-button px-3 ms-1 delete-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            location.href = '../inventory/delete/{{$prod -> product_id}}';">
                        Delete</button>
                        <button type="button" class="primary-button px-3 ms-1 submit-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            location.href = '../inventory/edit/{{$prod -> product_id}}';">
                        Update</button>
                    </div>
                </div>
            @endforeach
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