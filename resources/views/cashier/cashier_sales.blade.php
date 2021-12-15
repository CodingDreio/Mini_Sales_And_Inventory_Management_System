@extends('layouts.cashier_layout')
@section('content')
    <div class="m-3">
        <a class="header-link" href="{{ route('admin_viewUsers') }}">
            <h2 class="header-text">
                <i class="fa fa-chart-bar"></i>
                &nbsp;&nbsp;Sales
            </h2>
        </a>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="bg-light mt-3">
            <ol class="breadcrumb pt-1 pb-1 ps-3">
                <li class="breadcrumb-item">
                    <a class="fs-6" style="text-decoration: none;" href="{{ route('cashier') }}">Home</a>
                </li>
                <li class="breadcrumb-item fs-6 active" aria-current="page">View Sales</li>
            </ol>
        </nav>
        
    </div>
    <hr>
    <div class="m-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="mb-3" id="salesSummary">
                            <h5>Date :&nbsp;<strong id="salesDate">{{ $date }}</strong></h5>
                            <h5>Total Amount :&nbsp;<strong id="totalAmount">&#8369;&nbsp;{{ number_format($totalAmount,2) }}</strong></h5>
                            <h5>No. of Transactions :&nbsp;<strong id="numTransac">{{ $count }}</strong></h5>
                        </div>
                        <label for="dateFilter">View sales on:</label>
                        <div class="input-group mb-1" id="dateFilter">
                            <input type="date" class="form-control" id="filterDate" aria-label="date" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-filter"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="bottom-0 end-0" id="backBtn" hidden>
                            <a class="btn btn-success btn-sm float-end" href="{{ route('cashier') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 sticky-top" id="tabContainer" hidden>
                        
                        <div class="mb-1">
                            <button id="showSalesBtn" class="btn form-control primary-btn mb-1" onclick="showSalesTable()">
                                <i class="fa fa-table"></i>&nbsp;&nbsp;View Sales Table
                            </button>
                        </div>

                        <div class="pt-3 list-height overflow-scroll scroll-hide" id="salesTab" style="background-color: #fffef2;">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                @foreach ($todaySales as $sale)
                                    <li class="nav-item" role="presentation" onclick="showOrders('{{ $sale->sales_report_id }}')">
                                        <a class="nav-link tabLink" id="{{ $sale->sales_report_id }}" data-bs-toggle="tab" href="#orderTab" role="tab" aria-controls="home" aria-selected="true">
                                            {{ $sale->created_at.'&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;'.$sale->sales_invoice_no }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8" id="tabcontentContainer" hidden>
                        <div class="tab-content" id="salesTabContent" hidden>
                            <div class="tab-pane fade show active" id="orderTab" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <h6>Sales Invoice No. :&nbsp;<strong id="salesInvoiceNo"></strong></h6>
                                        <h6>Vatable Sale :&nbsp;<strong id="vatableSale"></strong></h6>
                                        <h6>VAT amount :&nbsp;<strong id="vatAmount"></strong></h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <h6>Total Price :&nbsp;<strong id="totalPrice"></strong></h6>
                                        <h6>Cash :&nbsp;<strong id="cash"></strong></h6>
                                        <h6>Change :&nbsp;<strong id="change"></strong></h6>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-hover" style="background-color: #fffef2;">
                                    <thead>
                                        <tr>
                                          <th scope="col text-center">Product</th>
                                          <th scope="col text-center">Price</th>
                                          <th scope="col text-center">Discount</th>
                                          <th scope="col text-center">Quantity</th>
                                          <th scope="col text-center">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody id="ordersTableList">
                                      </tbody>
                                </table>
                            </div>
                            {{-- <a class="btn btn-success btn-sm float-end" href="{{ route('cashier') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a> --}}
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12" id="salesTableContent">
                        <table class="table table-striped table-hover" style="background-color: #fffef2;">
                            <thead>
                                <tr>
                                    <th scope="col text-center">Date & Time</th>
                                    <th scope="col text-center">Sales Invoice No.</th>
                                    <th scope="col text-center">Vatable Sale</th>
                                    <th scope="col text-center">VAT Amount</th>
                                    <th scope="col text-center">Cash</th>
                                    <th scope="col text-center">Change</th>
                                    <th scope="col text-center">Total Price</th>
                                </tr>
                            </thead>
                            <tbody id="salesTableList">
                                @foreach ($todaySales as $sale)
                                    <tr onclick="clickShowOrders('{{ $sale->sales_report_id }}')">
                                        <td class="table-data">{{ $sale->created_at }}</td>
                                        <td class="table-data">{{ $sale->sales_invoice_no }}</td>
                                        <td class="table-data">&#8369;&nbsp;{{ number_format($sale->vatable_sale,2) }}</td>
                                        <td class="table-data">&#8369;&nbsp;{{ number_format($sale->vat_amount) }}</td>
                                        <td class="table-data">&#8369;&nbsp;{{ number_format($sale->cash,2) }}</td>
                                        <td class="table-data">&#8369;&nbsp;{{ number_format($sale->change,2) }}</td>
                                        <td class="table-data">&#8369;&nbsp;{{ number_format($sale->total_price,2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <a class="btn btn-success btn-sm float-end" href="{{ route('cashier') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Scripts --}}
    <script>
        $(document).ready(function(){
            $("#filterDate").on("change", function(){

                element = document.querySelector('#salesTabContent');
                element.hidden = true;
                $.ajax({
                    type:"get",
                    url:"/cashier/fetch_sales_by_date/"+$("#filterDate").val(),
                    datatype:"json",
                    success:function(response){
                        
                        if(response.sales.length > 0 ){
                            
                            $('#myTab').html('');
                            $('#salesTableList').html('');
                            $('#salesDate').text(response.date);
                            $('#totalAmount').text(response.totalAmount.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                            $('#numTransac').text(response.count);
                            $.each(response.sales, function(key, sale){
                                $('#myTab').append('<li class="nav-item" role="presentation" onclick="showOrders('+sale.sales_report_id+')">\
                                            <a class="nav-link tabLink" id="'+sale.sales_report_id+'" data-bs-toggle="tab" href="#orderTab" role="tab" aria-controls="orders" aria-selected="true">\
                                                '+sale.created_at+'&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;'+sale.sales_invoice_no+'\
                                            </a>\
                                        </li>');
                                
                                $('#salesTableList').append('<tr onclick="clickShowOrders('+sale.sales_report_id+')">\
                                            <td class="table-data">'+sale.created_at+'</td>\
                                            <td class="table-data">'+sale.sales_invoice_no+'</td>\
                                            <td class="table-data">&#8369;&nbsp;'+sale.vatable_sale.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                            <td class="table-data">&#8369;&nbsp;'+sale.vat_amount.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                            <td class="table-data">&#8369;&nbsp;'+sale.cash.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                            <td class="table-data">&#8369;&nbsp;'+sale.change.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                            <td class="table-data">&#8369;&nbsp;'+sale.total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                        </tr>');
                                        // x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                            });
                        }else{
                            
                            $('#myTab').html('');
                            $('#salesTableList').html('');
                            $('#salesTableList').append('<tr>\
                                <td class="table-data text-center" colspan="7"> No sales found!</td>\
                            </tr>');    

                            $('#myTab').append('<li class="text-center">\
                                            No sales found!\
                                        </li>');
                        }
                        // console.log(response.sales);
                    }
                });
            });
        });




        function clickShowOrders(id){
            $('#'+id).click();
        }

        function showOrders(elemID){
            // console.log("Show Orders");
            returnSalesView();
            element = document.querySelector('#salesTabContent');
            element.hidden = false;
            // backBtn = document.querySelector('#backBtn');
            // backBtn.hidden = false;

            $.ajax({
                type:"get",
                url:"/cashier/fetch_order_by_id/"+elemID,
                datatype:"json",
                success:function(response){
                    // console.log(response.sales);
                    // console.log(response.orders);
                    // Update Sales Info

                    $.each(response.sales, function(key, sale){
                        // console.log(sale.sales_invoice_no);
                        $('#salesInvoiceNo').text(sale.sales_invoice_no);
                        $('#vatableSale').text('₱ '+sale.vatable_sale.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                        $('#vatAmount').text('₱ '+sale.vat_amount.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                        $('#totalPrice').text('₱ '+sale.total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                        $('#cash').text('₱ '+sale.cash.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                        $('#change').text('₱ '+sale.change.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
                    });

                    // Update Orders table
                    $('#ordersTableList').html('');
                    $.each(response.orders, function(key, item){
                        var type;
                        var discount = item.discount;
                        var disStr = '';
                        if(item.discount_type === 0){
                            type = "&#8369;";
                            disStr = type+' '+discount;
                            // console.log(type);
                        }else if(item.discount_type === 1){
                            type = "&#37;";
                            disStr = discount+' '+type;
                            // console.log(type);
                        }else{
                            type = "";
                            discount = ""
                            // console.log(type);
                        }

                        $('#ordersTableList').append(
                            '<tr>\
                                <td class="table-data">'+item.product_name+'</td>\
                                <td class="table-data">₱ '+item.price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                                <td class="table-data">'+disStr+'</td>\
                                <td class="table-data text-center">'+item.quantity+'</td>\
                                <td class="table-data">₱ '+item.total_price.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")+'</td>\
                            </tr>');
                    });
                }
            });
        }

        function showSalesTable(){
            element = document.querySelector('#tabContainer');
            element.hidden = true;
            element = document.querySelector('#tabcontentContainer');
            element.hidden = true;
            element = document.querySelector('#salesTabContent');
            element.hidden = true;
            element = document.querySelector('#salesTab');
            element.hidden = true;
            element = document.querySelector('#showSalesBtn');
            element.hidden = true;
            element = document.querySelector('#dateFilter');
            element.hidden = false;
            // element = document.querySelector('#salesSummary');
            // element.hidden = false;
            element = document.querySelector('#salesTableContent');
            element.hidden = false;
            backBtn = document.querySelector('#backBtn');
            backBtn.hidden = true;
        }

        function returnSalesView(){
            element = document.querySelector('#tabContainer');
            element.hidden = false;
            element = document.querySelector('#tabcontentContainer');
            element.hidden = false;
            element = document.querySelector('#dateFilter');
            element.hidden = false;
            element = document.querySelector('#salesTabContent');
            element.hidden = false;
            element = document.querySelector('#salesTab');
            element.hidden = false;
            element = document.querySelector('#showSalesBtn');
            element.hidden = false;
            // element = document.querySelector('#salesSummary');
            // element.hidden = true;
            element = document.querySelector('#salesTableContent');
            element.hidden = true;
            backBtn = document.querySelector('#backBtn');
            backBtn.hidden = false;
        }
    </script>

@endsection