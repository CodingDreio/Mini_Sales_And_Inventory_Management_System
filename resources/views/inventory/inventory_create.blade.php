@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
    <h1>Create Product</h1>
        <form method="POST" action="{{route('inventory_store')}}">
            @method('POST')
            @csrf
            <div class="d-flex justify-content-center mb-2">
                <img src="../../images/img_default.jpg" class="edit-photo align-center">
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="">
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_price">Price</label>
                <input type="number" id="product_price" name="product_price" value="" class="form-control" />
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_quantity">Stock</label>
                <input type="number" id="product_quantity" name="product_quantity" value="" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Description</label>
                <textarea class="form-control" value="" id="product_description" name="product_description" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button class="secondary-button px-md-5 px-3" onclick="javascript:window.history.back(-1);return false;">Cancel</button>
                <button class="primary-button px-md-5 px-3" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection