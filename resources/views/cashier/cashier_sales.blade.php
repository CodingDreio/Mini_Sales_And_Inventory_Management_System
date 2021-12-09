@extends('layouts.cashier_layout')
@section('content')
    <div class="m-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="mb-3" id="salesSummary">
                            <h5>Date :&nbsp;<strong id="salesDate">{{ $date }}</strong></h5>
                            <h5>Total Amount :&nbsp;<strong id="totalAmount">{{ $totalAmount }}</strong></h5>
                            <h5>No. of Transactions :&nbsp;<strong id="numTransac">{{ $count }}</strong></h5>
                        </div>
                        <label for="dateFilter">View sales on:</label>
                        <div class="input-group mb-1" id="dateFilter">
                            <input type="date" class="form-control" id="filterDate" aria-label="date" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-filter"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                    </div>
                    <hr>
                    <div class="col-sm-12 col-md-12 col-lg-4 sticky-top" id="tabContainer" hidden>
                        
                        {{-- <div class="mb-3 mt-3">
                            <h6>Date :&nbsp;<strong id="salesDate">{{ $date }}</strong></h6>
                            <h6>Total Amount :&nbsp;<strong id="totalAmount">{{ $totalAmount }}</strong></h6>
                            <h6>Number of Transactions :&nbsp;<strong id="numTransac">{{ $count }}</strong></h6>
                        </div> --}}
                        <div class="mb-1">
                            <button id="showSalesBtn" class="btn form-control primary-btn mb-1" onclick="showSalesTable()">
                                <i class="fa fa-table"></i>&nbsp;&nbsp;View Sales Table
                            </button>
                            {{-- <button id="returnSalesBtn" class="btn form-control primary-btn mb-1" onclick="returnSalesView()" hidden>
                                <i class="fa fa-redo-alt"></i>&nbsp;&nbsp;Return
                            </button> --}}
                        </div>

                        <div class="pt-3 list-height overflow-scroll scroll-hide" id="salesTab" style="background-color: #fffef2;">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                @foreach ($todaySales as $sale)
                                    <li class="nav-item" role="presentation" onclick="showOrders('{{ $sale->sales_report_id }}')">
                                        <a class="nav-link tab-link" id="{{ $sale->sales_report_id }}" data-bs-toggle="tab" href="#orderTab" role="tab" aria-controls="home" aria-selected="true">
                                            {{ $sale->created_at.' _ '.$sale->sales_invoice_no }}
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
                                          <th scope="col text-center">Type (&#37;,&#8369;)</th>
                                          <th scope="col text-center">Quantity</th>
                                          <th scope="col text-center">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody id="ordersTableList">
                                      </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Prof...</div>
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
                                        <td class="table-data">{{ $sale->vatable_sale }}</td>
                                        <td class="table-data">{{ $sale->vat_amount }}</td>
                                        <td class="table-data">{{ $sale->cash }}</td>
                                        <td class="table-data">{{ $sale->change }}</td>
                                        <td class="table-data">{{ $sale->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        $('#myTab').html('');
                        $('#salesTableList').html('');
                        $('#salesDate').text(response.date);
                        $('#totalAmount').text(response.totalAmount);
                        $('#numTransac').text(response.count);
                        $.each(response.sales, function(key, sale){
                            $('#myTab').append('<li class="nav-item" role="presentation" onclick="showOrders('+sale.sales_report_id+')">\
                                        <a class="nav-link" id="'+sale.sales_report_id+'" data-bs-toggle="tab" href="#orderTab" role="tab" aria-controls="orders" aria-selected="true">\
                                            '+sale.created_at+' _ '+sale.sales_invoice_no+'\
                                        </a>\
                                    </li>');
                            
                            $('#salesTableList').append('<tr onclick="clickShowOrders('+sale.sales_report_id+')">\
                                        <td class="table-data">'+sale.created_at+'</td>\
                                        <td class="table-data">'+sale.sales_invoice_no+'</td>\
                                        <td class="table-data">'+sale.vatable_sale+'</td>\
                                        <td class="table-data">'+sale.vat_amount+'</td>\
                                        <td class="table-data">'+sale.cash+'</td>\
                                        <td class="table-data">'+sale.change+'</td>\
                                        <td class="table-data">'+sale.total_price+'</td>\
                                    </tr>');
                        });


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
                        $('#vatableSale').text(sale.vatable_sale);
                        $('#vatAmount').text(sale.vat_amount);
                        $('#totalPrice').text(sale.total_price);
                        $('#cash').text(sale.cash);
                        $('#change').text(sale.change);
                    });

                    // Update Orders table
                    $('#ordersTableList').html('');
                    $.each(response.orders, function(key, item){
                        var type;
                        var discount = item.discount;
                        if(item.discount_type === 0){
                            type = "&#8369;";
                            // console.log(type);
                        }else if(item.discount_type === 1){
                            type = "&#37;";
                            // console.log(type);
                        }else{
                            type = "";
                            discount = ""
                            // console.log(type);
                        }
                        

                        $('#ordersTableList').append(
                            '<tr>\
                                <td class="table-data">'+item.product_name+'</td>\
                                <td class="table-data">'+item.price+'</td>\
                                <td class="table-data">'+discount+'</td>\
                                <td class="table-data text-center">'+type+'</td>\
                                <td class="table-data text-center">'+item.quantity+'</td>\
                                <td class="table-data">'+item.total_price+'</td>\
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
        }
    </script>

@endsection