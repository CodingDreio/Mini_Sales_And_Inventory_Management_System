@extends('layouts.admin_layout')
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="opt-link" href="{{ route('inventory') }}"  style="text-decoration: none;">
                                                <div class="row">
                                                    <div class="col-lg-2 text-center">
                                                        <i class="fa fa-clipboard-list"></i>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        Inventory
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="opt-link" href="{{ route('cashier') }}"  style="text-decoration: none;">
                                                <div class="row">
                                                    <div class="col-lg-2 text-center">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        POS Terminal
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="opt-link" href="{{ route('admin_viewUsers') }}"  style="text-decoration: none;">
                                                <div class="row">
                                                    <div class="col-lg-2 text-center">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        Users
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
@endsection