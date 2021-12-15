@extends('layouts.cashier_layout')
@section('content')
@foreach ($transaction as $purchase)
    <div class="m-3">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-8 col-height mt-3">
                <div class="card card-height">
                    <div class="card-header pt-3">
                        <div class="row">
                            <div class="col-sm-7 col-md-7 col-lg-7 ">
                                <div class="float-start me-3 mb-3">
                                    <h6>Cashier: {{$user->first_name}}, {{ $user->last_name }}</h6>
                                    <h6>Sales Invoce No.: {{ $purchase->sales_invoice_no }}</h6>
                                    <h6 class="text-secondary">Vatable Sale: <span id="vatSale">{{ $purchase->vatable_sale }}</span></h6>
                                    <h6 class="text-secondary">VAT Amount: <span id="vatAmount"> {{ $purchase->vat_amount }}</span></h6>
                                    
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-5">
                                <div class="float-end me-3 mb-3">
                                    <h5>Total Amount:</h5>
                                    <h2 class="ms-5" id="totalPrice">{{ $purchase->total_price }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" >
                        <h4 class="header-text">Orders</h4>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">Product</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Discount</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Total</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody id="ordersTableList">
                              </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="card-footer">
                        <div>
                            <button type="button" class="btn secondary-btn btn-sm float-end"
                                data-bs-toggle="modal" data-bs-target="#delModal">Cancel</button>
                            <button class="btn primary-btn btn-sm float-end me-2"
                                data-bs-toggle="modal" data-bs-target="#purModal">Purchace</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4 col-height mt-3">
                <div class="card card-height">
                    <div class="card-body">
                        <div id="purchaseForm" class="form-display-none">
                            <h4 class="header-text text-center mb-3">Add item</h4>
                            {{-- <form action="" method="post">
                                @csrf --}}
                                <div class="mb-3" id="showProductContainer" hidden>
                                    
                                </div>
                                <div class="">
                                    <div id="errorList"></div>
                                    <div id="successNotif"></div>
                                    <input type="text" id="transId" name="transID" value="{{ $purchase->sales_report_id }}" hidden>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Product Code:</span>
                                        <input type="text" id="code" name="code" class="form-control" placeholder="Code" aria-label="Code" aria-describedby="basic-addon1" required>
                                    </div>
                                    <span class="text-center text-warning" id="qtyExceedsErr" hidden>Quantity exceeds!</span>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Quantity:</span>
                                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" max="" aria-label="Quantity" aria-describedby="basic-addon1" disabled required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Discount:</span>
                                        <input type="number" id="discount" name="discount" class="form-control" aria-label="Discount" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">Type:</span>
                                        <select name="type" id="type" class="form-control">
                                            <option value="1" id="percent" selected>&#37;</option>
                                            <option value="0" id="peso">&#8369;</option>
                                        </select> 
                                    </div>
                                    <button type="button" class="btn tertiary-btn btn-sm float-end" id="clearFields">Clear</button>
                                    <button type="button" class="btn primary-btn btn-sm float-end me-2" id="addProd">Add</button>
                                </div>
                                
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                <p><strong>Note:</strong> You can't logout with pending transactions. Complete or cancel the purchase first.</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to Cancel purchase?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-secondary">This will permanently remove the transaction records.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('cancelPurchase',['id'=> $purchase->sales_report_id]) }}" class="btn primary-btn">Submit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="purModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('completePurchase',['id'=> $purchase->sales_report_id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="float-end mb-3">
                            <h6>Total Amount to pay:</h6>
                            <h3 id="amount" class="ms-5">{{ $purchase->total_price }}</h3>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Cash:</strong></span>
                            <input type="number" class="form-control" id="cash" name="cash" placeholder="Cash received" aria-label="Cash" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Change:</strong></span>
                            <input type="number" class="form-control" id="change" name="change" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn primary-btn" id="confirmPay" disabled>Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

{{-- ======================================================================================================= --}}
{{-- Scripts --}}
{{-- ======================================================================================================= --}}
    <script>
// Display orders into table
        fetchOrders();

// Click
// Clear add order fields
        $(document).ready(function(){
            $(document).on('click','#clearFields',function(e){
                $('#code').val("");
                $('#quantity').val("");
                $('#discount').val("");
                $('#type').val("");
                $('#errorList').html('');
                $('#errorList').removeClass('alert alert-danger');
                var showProductContainer = document.querySelector('#showProductContainer');
                showProductContainer.hidden = true;
            });
        });

// KEYUP
// Code input search product on KEYUP
        $(document).ready(function (){
            $(document).on('keyup','#code',function(){
                var code = $('#code').val();
                if(code === ''){
                    var showProductContainer = document.querySelector('#showProductContainer');
                    showProductContainer.hidden = true;
                    $('#showProductContainer').html('');
                }else{
                    var sucNotif = document.querySelector('#successNotif');
                    sucNotif.hidden = true;
                    $.ajax({
                        type:"get",
                        url:"/cashier/search_product/"+code,
                        datatype:"json",
                        success:function(response){
                            if(response.status == '105'){
                                var qtyInput = document.querySelector('#quantity');
                                qtyInput.disabled = true;
                                var showProductContainer = document.querySelector('#showProductContainer');
                                showProductContainer.hidden = false;
                                $('#quantity').val('');
                                $('#showProductContainer').html('');
                                $('#showProductContainer').append(response.str);
                            }else{
                                if(response.count > 1){
                                    var qtyInput = document.querySelector('#quantity');
                                    qtyInput.disabled = true;
                                }else{
                                    var qtyInput = document.querySelector('#quantity');
                                    qtyInput.disabled = false;
                                }
                                var showProductContainer = document.querySelector('#showProductContainer');
                                showProductContainer.hidden = false;
                                $('#showProductContainer').html('');
                                $('#showProductContainer').append(response.str);
                                // console.log($('#quantity3').val());
                            }
                        }
                    });
                }
            });
        });

// Click
// Selects the search product result
        function selectProduct(quantity,code){
            $('#code').val(code);
            $.ajax({
                type:"get",
                url:"/cashier/search_product/"+code,
                datatype:"json",
                success:function(response){
                    if(response.status == '105'){
                        var qtyInput = document.querySelector('#quantity');
                        qtyInput.disabled = true;
                        var showProductContainer = document.querySelector('#showProductContainer');
                        showProductContainer.hidden = false;
                        $('#showProductContainer').html('');
                        $('#showProductContainer').append(response.str);
                    }else{
                        var qtyInput = document.querySelector('#quantity');
                        qtyInput.disabled = false;
                        var showProductContainer = document.querySelector('#showProductContainer');
                        showProductContainer.hidden = false;
                        $('#showProductContainer').html('');
                        $('#showProductContainer').append(response.str);
                    }
                    // console.log($('#quantity3').val());
                    
                }
            });
        }


// Add product
        $(document).ready(function(){
            $(document).on('click','#addProd',function(e){
                e.preventDefault();
                var tansID = $('#transId').val();
                var data = {
                    'trasId':$('#transId').val(),
                    'code':$('#code').val(),
                    'quantity':$('#quantity').val(),
                    'discount':$('#discount').val(),
                    'type':$('#type').val()
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:"post",
                    url:"/cashier/add_order/"+tansID,
                    data:data,
                    datatype:"json",
                    success:function(response){
                        $('#errorList').html('');
                        $('#errorList').addClass('alert alert-danger');
                        if(response.status == 400){
                            $.each(response.errors, function(key, err_values){
                                $('#errorList').append('<p>'+err_values+'<p>');   
                            });
                            // $("#errorList").delay(10000).fadeOut(500);
                        }else if(response.status == 100){
                            $('#errorList').append('<p>'+response.message+'<p>');
                            // $("#errorList").delay(10000).fadeOut(500);
                        }else if(response.status == 101){
                            $('#errorList').append('<p>'+response.message+'<p>');
                            // $("#errorList").delay(10000).fadeOut(500);
                        }else{
                            $('#successNotif').html('');
                            $('#successNotif').addClass('alert alert-success');
                            $('#errorList').removeClass('alert alert-danger');
                            $('#successNotif').append('<p>'+response.message+'<p>');
                            // $("#successNotif").delay(3000).fadeOut(1000);
                            $('#code').val("");
                            $('#quantity').val("");
                            $('#discount').val("");
                            $('#type').val("");
                            $('#type').val("");
                            var showProductContainer = document.querySelector('#showProductContainer');
                            showProductContainer.hidden = true;
                            var sucNotif = document.querySelector('#successNotif');
                            sucNotif.hidden = false;

                        }
                        fetchOrders();
                    }
                });
            });
        });

        

// Cash input validation and Confirm button attribute change
        $(document).ready(function (){
            $(document).on('keyup','#cash',function(){
                var cash = $(this).val();
                var amount = parseInt(document.getElementById("amount").textContent);
                const button = document.querySelector('#confirmPay');
                if(cash >= amount){
                    var change = cash-amount;
                    button.disabled = false;
                }else{
                    var change = 0;
                    button.disabled = true;
                }
                document.getElementById("change").value = change;
            });
        });

// Discount input validation and selected type attribute change
        $(document).ready(function (){
            $(document).on('keyup','#discount',function(){
                var discount = $(this).val();
                if(discount <= 100){
                    const optionPercent = document.querySelector('#percent');
                    optionPercent.selected = true;
                    const optionPeso = document.querySelector('#peso');
                    optionPeso.selected = false;
                }else{
                    const optionPercent = document.querySelector('#percent');
                    optionPercent.selected = false;
                    const optionPeso = document.querySelector('#peso');
                    optionPeso.selected = true;
                }
            });

// Quantity input validation 
            $(document).on('keyup','#quantity',function(){
                var quantity = $(this).val();
                // var qty = $('#'+$('#code').val()+'qty').val();
                var qty = parseInt($('#productQuantityText').text());
                const btn = document.querySelector('#addProd');
                var errQty = document.querySelector('#qtyExceedsErr');
                // console.log(quantity + '   ' + qty);
                if(quantity > 0 && quantity <= qty){
                    btn.disabled = false;
                    errQty.hidden = true;
                }else if(quantity > qty){
                    errQty.hidden = false;
                    btn.disabled = true;
                }else{
                    $(this).val("");
                    errQty.hidden = true;
                    btn.disabled = true;
                }

            });
        });

// Function to display orders
        function fetchOrders(){
            var transID = $('#transId').val();
            $.ajax({
                type:"get",
                url:"/cashier/fetch_order/"+transID,
                datatype:"json",
                success:function(response){
                    // console.log(response.orders);
                    // {{ route("removeOrder",["id"=>'+item.order_id+']) }}
                    $('#ordersTableList').html('');
                    $.each(response.orders, function(key, item){
                        // console.log(item.order_id);
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
                                  <td class="table-data">₱ '+item.price+'</td>\
                                  <td class="table-data text-center">'+disStr+'</td>\
                                  <td class="table-data text-center">'+item.quantity+'</td>\
                                  <td class="table-data">₱ '+item.total_price+'</td>\
                                  <td class="table-data">\
                                        <div class="float-middle">\
                                            <a href="/cashier/remove-order/'+item.order_id+'" class="btn tbl-btn btn-sm"><i class="fa fa-times"></i></a>\
                                        </div>\
                                  </td>\
                                </tr>'
                        );
                        
                        $("#vatSale").text(response.vatableSale);
                        $("#vatAmount").text(response.vat);
                        $("#totalPrice").text(response.amount);
                        $("#amount").text(response.amount);
                    });
                }
            });
        }

    </script>
@endsection