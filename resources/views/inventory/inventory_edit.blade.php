@extends('layouts.inventory_layout')
@section('content')
    <h1>Edit {{$product->product_name}}</h1>
    <form method="POST" action="/inventory/{{$product -> product_id}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" placeholder="Enter Name">
        </div>
        <div class="form-outline">
            <label class="form-label" for="product_price">Price</label>
            <input type="number" id="product_price" class="form-control" />
        </div>
        <div class="form-outline">
            <label class="form-label" for="product_quantity">Stock</label>
            <input type="number" id="product_quantity" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="product_description" class="form-label">Example textarea</label>
            <textarea class="form-control" id="product_description" rows="3"></textarea>
        </div>
    </form>
@endsection