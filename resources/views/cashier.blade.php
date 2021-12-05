@extends('layouts.cashier_layout')
@section('content')
    <div class="">
        <div class="container">
            <div class="vh-75 d-flex align-items-center">
                <div class="container my-5 justify-content-center align-items-center h-auto">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="{{ asset('images/prodigy_sales_wg.svg') }}" class="home-logo p-5">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('cashierNew',['si'=>0]) }}"  style="text-decoration: none;">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <img class="cashier-opt-img" src="{{ asset('images/cart.png') }}" alt="Cart">
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <h3 class="text-success">Make New Purchase</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('cashier_sales',['id'=>Auth::id()]) }}" style="text-decoration: none;">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <img class="cashier-opt-img" src="{{ asset('images/sale.png') }}" alt="Cart">
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <h3 class="text-success">View Sales</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
     


























{{--         
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-header pt-3">
                        <div class="float-end me-3 mb-3">
                            <h5>Total Amount:</h5>
                            <h2 class="ms-5"> P 568.00</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Orders</h5>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Product</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Discount</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                  <td>45</td>
                                  <td>23</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                  <td>45</td>
                                  <td>23</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Jacob</td>
                                  <td>Larry the Bird</td>
                                  <td>@twitter</td>
                                  <td>45</td>
                                  <td>23</td>
                                </tr>
                              </tbody>
                        </table>
                        <br>
                        <hr>
                        <div>
                            <button class="btn secondary-btn btn-sm float-start">Cancel</button>
                            <button class="btn primary-btn btn-sm float-end">Purchace</button>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5">
                <div class="card pb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div id="purchaseBtn">
                                <button class="btn primary-btn btn-sm"  onclick="showOrderForm()">New Purchase</button>
                            </div>
                        </div>
                        <hr>
                        <div id="purchaseForm" class="form-display-none">
                            <h5>Add orders</h5>
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Product Code:</span>
                                    <input type="text" class="form-control" placeholder="Code" aria-label="Code" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Quantity:</span>
                                    <input type="number" class="form-control" aria-label="Quantity" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Discount:</span>
                                    <input type="number" class="form-control" aria-label="Quantity" aria-describedby="basic-addon1">
                                    <span class="input-group-text" id="basic-addon1">Discount Type:</span>
                                    <select name="" id="" class="form-control">
                                        <option value="0">&#8369;</option>
                                        <option value="1">&#37;</option>
                                    </select>
                                </div>
                                <button class="btn tertiary-btn btn-sm float-start">Clear</button>
                                <button type="submit" class="btn primary-btn btn-sm float-end">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showOrderForm() {
            var x = document.getElementById("purchaseForm");
            var y = document.getElementById("purchaseBtn");

            x.style.display = "block";
            y.style.display = "none"

        }
    </script> --}}
@endsection