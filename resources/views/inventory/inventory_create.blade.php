@extends('layouts.inventory_layout')
@section('content')
    <div class="container">
    <h1>Create Product</h1>
        <form method="POST" action="{{route('inventory_store')}}">
            @method('POST')
            @csrf
            <div class="d-flex justify-content-center mb-2">
                <img src="../../images/img_default.jpg" class="edit-photo align-center" id="photo_prod">
            </div>
            <input type="file" class="d-block mb-2 px-0 w-50 w-md-10" id="product_photo" name="product_photo" accept="image/*" onchange="document.getElementById('photo_prod').src =  '../../images/'+this.value.split('\\').pop().split('/').pop();">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="">
            </div>
            <div class="form-outline">
                <label class="form-label" for="product_code">Product Code</label>
                <input type="text" id="product_code" name="product_code" value="" class="form-control" />
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
            <div class="justify-content-between">
                <button class="secondary-button px-md-5 px-3 float-end" onclick="javascript:window.history.back(-1);return false;">Cancel</button>
                <button class="primary-button px-md-5 px-3 me-2 float-end" type="submit">Submit</button>
            </div><br><br><br>  
        </form>
    </div>
@endsection