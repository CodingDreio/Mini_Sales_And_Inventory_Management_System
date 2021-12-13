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
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('admin_viewUsers') }}"  style="text-decoration: none;">
                                        HAHHA
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
@endsection