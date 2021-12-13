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
                <p><b>Current Stock</b>: {{$product->quantity}}</p>
                <form method="POST" action="{{route('add_stock', ['id' => $product->product_id])}}">
                    @method('POST')
                    @csrf
                    <label for="stock_add" class="form-label">Input quantity to be added</label>
                    <input type="number" class="form-control mb-2" id="stock_add" name="stock_add" value="" min=1>
                    <div class="d-flex justify-content-between">
                        <button class="tertiary-button px-md-5 px-3" onclick="javascript:window.history.back(-1);return false;">Back</button>
                        <button class="primary-button px-md-5 px-3" onclick="return confirm('Are you sure you want to add stocks?')" type="submit">Confirm</button>
                    </div>
                </form>
            </div>
        <div>
    </div>
@endsection