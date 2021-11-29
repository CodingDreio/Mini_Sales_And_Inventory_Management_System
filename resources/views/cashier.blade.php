@extends('layouts.cashier_layout')
@section('content')
    <div class="container">
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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <button class="btn primary-btn btn-sm">New Purchase</button>
                        </div>
                        <hr>
                        <div>
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
                                {{-- <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Discount:</span>
                                    <input type="number" class="form-control" aria-label="Quantity" aria-describedby="basic-addon1">
                                    <button class="btn btn-secondary btn-sm">Clear</button>
                                    <button class="btn btn-primary btn-sm">Add</button>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection