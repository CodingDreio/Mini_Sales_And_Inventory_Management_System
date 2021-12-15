@extends('layouts.inventory_layout')
@section('content')
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1 class="header-text"><i class="fa fa-clipboard-list"></i>&nbsp;&nbsp;Sales Transaction History</h1>
        </div>
        <hr>
        <div>
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-6 mt-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12" id="filterOptionContainer">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #32502E;color:#ffffff;" id="basic-addon1"><i class="fa fa-sliders-h"></i>&nbsp;&nbsp;View Option:</span>
                                <select class="form-select" aria-label="Default select example" id="viewOption">
                                    <option value="1" > Date Range (From - To)</option>
                                    <option value="2" >Date</option>
                                    <option value="3" selected>All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12" id="dateContainer" hidden>
                            <label for="dateFilter">View sales on:</label>
                            <div class="input-group mb-1" id="dateFilter">
                                <input type="date" class="form-control" id="filterDate" name="filterDate" onkeydown="return false" aria-label="date" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-filter"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12" id="fromToDateContainer" hidden>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12" id="errToDate" hidden>
                                    <p class="text-danger">Please select "To" date.</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" id="errFromDate" hidden>
                                    <p class="text-danger">Please select "From" date.</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" id="insDate">
                                    <p class="text-secondary">Please select date range.</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" id="errDate" hidden>
                                    <p class="text-danger">Please correct the date range.</p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="fromDateFilter">From:</label>
                                    <div class="input-group mb-1" id="fromDateFilter">
                                        <input type="date" class="form-control" id="fromFilterDate" name="fromFilterDate" onkeydown="return false" aria-label="date" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="toDateFilter">To:</label>
                                    <div class="input-group mb-1" id="toDateFilter">
                                        <input type="date" class="form-control" id="toFilterDate" name="toFilterDate" onkeydown="return false" aria-label="date" aria-describedby="basic-addon1">
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10" id="saleInfo" hidden>
                            <h5>Date: </h5>
                            <h5>Total Sales: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="sales-list" id="salesListContainer">
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


    <script>

        // On Change in View Option
        $(document).ready(function(){
            $("#viewOption").on("change", function(){
                var opt = $(this).val();
                var dateContainer = document.querySelector('#dateContainer');
                var fromToDateContainer = document.querySelector('#fromToDateContainer');
                var saleInfo = document.querySelector('#saleInfo');
                // var salesListContainer = document.querySelector('#salesListContainer');
                if(opt == 1){
                    fromToDateContainer.hidden = false;
                    dateContainer.hidden = true;
                    saleInfo.hidden = true;
                    $('#salesListContainer').html('');
                }else if(opt == 2){
                    fromToDateContainer.hidden = true;
                    dateContainer.hidden = false;
                    saleInfo.hidden = true;
                    $('#salesListContainer').html('');
                }else{
                    fromToDateContainer.hidden = true;
                    dateContainer.hidden = true;
                    saleInfo.hidden = true;window.location.replace("/inventory_sales");
                }
            });
        });


        // On Change in Date Range
        // From - Date
        $(document).ready(function(){
            $("#fromFilterDate").on("change", function(){
                var fromDate = $("#fromFilterDate").val();
                var toDate = $("#toFilterDate").val();
                var errToDate = document.querySelector('#errToDate');
                var errFromDate = document.querySelector('#errFromDate');
                var insDate = document.querySelector('#insDate');
                var errDate = document.querySelector('#errDate');

                if(toDate == ''){
                    errToDate.hidden = false;
                    errFromDate.hidden = true;
                    insDate.hidden = true;
                }else{
                    errToDate.hidden = true;
                    errFromDate.hidden = true;
                    insDate.hidden = true;

                    if($('#fromFilterDate').val() > $('#toFilterDate').val()){
                        errDate.hidden = false;
                    }else{
                        errDate.hidden = true;
                    }
                    
                    // Query Sales
                    var data = {
                        'from':$('#fromFilterDate').val(),
                        'to':$('#toFilterDate').val(),
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:"get",
                        url:"/inventory_sales/date_range",
                        data:data, 
                        datatype:"json",
                        success:function(response){
                            $('#salesListContainer').html('');
                            if(response.count > 0){
                                $('#salesListContainer').append('<div class="mb-3">\
                                        <h6>Displaying sales <strong> <u>between</u> </strong>the given range.</h6>\
                                    </div>');
                                $.each(response.sales, function(key, sale){
                                    $('#salesListContainer').append('<div class="sales-row p-2 mb-2">\
                                            <div class="d-md-flex justify-content-between">\
                                                <div><b>Employee ID:</b> '+sale.emp_id+'</div>\
                                                <div> <b>Date:</b> '+sale.created_at+' </div>\
                                            </div>\
                                            <div class="d-flex justify-content-between">\
                                                <div> \
                                                    <p class="sales-invoice"> <b>Sales Invoice No.:</b> '+sale.sales_invoice_no+' </p>\
                                                    <p class="sales-price"> ₱ '+sale.total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                </div>\
                                                <div class="align-self-end"> \
                                                    <p class="sales-details"> <b>Cash:</b> '+sale.cash.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                    <p class="sales-details"> <b>Change:</b> '+sale.change.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    ');
                                });
                            }else{
                                $('#salesListContainer').append('<div class="mb-3">\
                                        <h6 class="text-center">No sales in between the given range.</h6>\
                                    </div>');
                            }
                        }
                    }); 
                }
            });
        });

        
        // On Change in Date Range
        // To - Date
        $(document).ready(function(){
            $("#toFilterDate").on("change", function(){
                var fromDate = $("#fromFilterDate").val();
                var toDate = $("#toFilterDate").val();
                var errToDate = document.querySelector('#errToDate');
                var errFromDate = document.querySelector('#errFromDate');
                var insDate = document.querySelector('#insDate');
                if(fromDate == ''){
                    errToDate.hidden = true;
                    errFromDate.hidden = false;
                    insDate.hidden = true;
                }else{
                    errToDate.hidden = true;
                    errFromDate.hidden = true;
                    insDate.hidden = true;

                    if($('#fromFilterDate').val() > $('#toFilterDate').val()){
                        errDate.hidden = false;
                    }else{
                        errDate.hidden = true;
                    }

                    // Query Sales
                    var data = {
                        'from':$('#fromFilterDate').val(),
                        'to':$('#toFilterDate').val(),
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:"get",
                        url:"/inventory_sales/date_range",
                        data:data, 
                        datatype:"json",
                        success:function(response){
                            $('#salesListContainer').html('');
                            if(response.count > 0){
                                $('#salesListContainer').append('<div class="mb-3">\
                                        <h6>Displaying sales <strong> <u>between</u> </strong>the given range.</h6>\
                                    </div>');
                                $.each(response.sales, function(key, sale){
                                    $('#salesListContainer').append('<div class="sales-row p-2 mb-2">\
                                            <div class="d-md-flex justify-content-between">\
                                                <div><b>Employee ID:</b> '+sale.emp_id+'</div>\
                                                <div> <b>Date:</b> '+sale.created_at+' </div>\
                                            </div>\
                                            <div class="d-flex justify-content-between">\
                                                <div> \
                                                    <p class="sales-invoice"> <b>Sales Invoice No.:</b> '+sale.sales_invoice_no+' </p>\
                                                    <p class="sales-price"> ₱ '+sale.total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                </div>\
                                                <div class="align-self-end"> \
                                                    <p class="sales-details"> <b>Cash:</b> '+sale.cash.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                    <p class="sales-details"> <b>Change:</b> '+sale.change.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+' </p>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    ');
                                });
                            }else{
                                $('#salesListContainer').append('<div class="mb-3">\
                                        <h6 class="text-center">No sales in between the given range.</h6>\
                                    </div>');
                            }
                        }
                    });
                }
            });
        });


    </script>
@endsection