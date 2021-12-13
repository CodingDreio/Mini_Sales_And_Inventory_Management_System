@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Sales and Inventory</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-3 d-flex justify-content-center justify-content-lg-between me-4">
                <img src="../../{{$product->photo}}" class="show-photo align-center">
            </div>
            <div class="col d-block">
                <h2 class="mb-2">{{$product->product_name}}</h2>
                <p><b>Price</b>: {{$product->price}}</p>
                <p><b>Stock</b>: {{$product->quantity}}</p>
                <p><b>Description</b>: {{$product->product_description}}</p>
            </div>
        <div>
        <div class="d-flex justify-content-between">
            <button class="tertiary-button px-md-5 px-3" onclick="javascript:window.history.back(-1);return false;">Back</button>
            <div>
                <button class="secondary-button px-md-5 px-3" onclick="if (confirm('Are you sure you want to delete?')) location.href = '../../inventory/delete/{{$product -> product_id}}';">Delete</button>
                <button class="primary-button px-md-5 px-3" onclick="location.href = '../../inventory/edit/{{$product -> product_id}}';">Update</button>
            </div>
        </div>
    </div>
@endsection