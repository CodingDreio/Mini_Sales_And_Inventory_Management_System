@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="mb-2">Product Information</h1>
            <div class="col-md-3">
                <img src="../../{{$product->photo}}" class="show-photo align-center">
            </div>
            <div class="col-md">
                <h2 class="mb-2">{{$product->product_name}}</h2>
                <p><b>Price</b>: {{$product->price}}</p>
                <p><b>Stock</b>: {{$product->quantity}}</p>
                <p><b>Description</b>: {{$product->product_description}}</p>
            </div>
        <div>
    </div>
@endsection