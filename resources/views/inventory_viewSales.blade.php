@extends('layouts.inventory_layout')
@section('content')
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Sales Transaction History</h1>
        </div>
        <div class="sales-list">
            @foreach($sales as $sale)
                <div class="sales-row p-2 mb-2">
                    <div class="d-md-flex justify-content-between">
                        <div><b>Employee ID:</b> {{ $sale -> emp_id }}</div>
                        <div> <b>Date:</b> {{ date('Y-m-d h:i:s', strtotime($sale -> created_at))}} </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div> 
                            <p class="sales-invoice"> <b>Sales Invoice No.:</b> {{ $sale -> sales_invoice_no }} </p>
                            <p class="sales-price"> P{{ $sale -> total_price }} </p>
                        </div>
                        <div class="align-self-end"> 
                            <p class="sales-details"> <b>Cash:</b> {{ $sale -> cash }} </p>
                            <p class="sales-details"> <b>Change:</b> {{ $sale -> change }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection