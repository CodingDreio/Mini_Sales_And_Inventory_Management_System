@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
    <h1>Edit {{$product->product_name}}</h1>
        <form method="POST" action="/inventory/edit/{{$product -> product_id}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" value="{{$product -> product_name}}">
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_price">Price</label>
                <input type="number" id="product_price" value="{{$product -> price}}" class="form-control" />
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_quantity">Stock</label>
                <input type="number" id="product_quantity" value="{{$product -> quantity}}" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Description</label>
                <textarea class="form-control" value="{{$product -> product_description}}" id="product_description" rows="3">{{$product -> product_description}}</textarea>
            </div>
        </form>
    </div>
@endsection