@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
    <h1>Edit {{$product->product_name}}</h1>
        <form method="POST" action="{{route('inventory_update', ['id' => $product->product_id])}}">
            @method('POST')
            @csrf
            <div class="d-flex justify-content-center mb-2">
                <img src="../../{{$product->photo}}" class="edit-photo align-center" id="photo_prod1">
            </div>
            <input type="file" class="d-block mb-2 px-0 w-50 w-md-100" id="product_photo" value="{{$product->photo}}" name="product_photo" accept="image/*" onchange="document.getElementById('photo_prod1').src =  '../../images/'+this.value.split('\\').pop().split('/').pop();">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product -> product_name}}">
            </div>
            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="number" class="form-control" id="product_code" name="product_code" value="{{$product -> code}}">
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_price">Price</label>
                <input type="number" id="product_price" name="product_price" value="{{$product -> price}}" class="form-control" />
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_quantity">Stock</label>
                <input type="number" id="product_quantity" name="product_quantity" value="{{$product -> quantity}}" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Description</label>
                <textarea class="form-control" value="{{$product -> product_description}}" id="product_description" name="product_description" rows="3">{{$product -> product_description}}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button class="tertiary-button px-md-5 px-2" onclick="javascript:window.history.back(-1);return false;">Cancel</button>
                <div>
                    <button class="secondary-button px-md-5 px-2" onclick="if (confirm('Are you sure you want to delete?')) location.href = '../../inventory/delete/{{$product -> product_id}}';">Delete</button>
                    <button class="primary-button px-md-5 px-2" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection