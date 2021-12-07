<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\SalesReport;
use App\Models\Order;


class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();

        if($userId == null){
            return redirect()->route('login');
        }
        
        if(session()->has('si')){
            return redirect()->route('cashierNew',$request->session()->get('si'));
        }
        return view('cashier');
    }
    
    // =========================================================================
    // New Purchase
    // Creates or inserts new transaction data
    // =========================================================================
    public function newPurchase($si)
    {   
        $user = Auth::user();
        $userId = Auth::id();

        if($userId == null){
            return redirect()->route('login');
        }

        if($si == 0){
            $userId = Auth::id();
            $count = DB::table('sales_reports')->get()->count();
            $count = $count + 1;
            $si = $userId.'-'.$count.'-'.time();
    
            DB::table('sales_reports')->insert([
                    'emp_id' => $userId,
                    'sales_invoice_no' => $si,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            
            session(['si' => $si]);
            return redirect()->route('cashierNew',$si);
        }else{
            
            $transaction = DB::table('sales_reports')
                ->where('sales_invoice_no', '=', $si)
                ->get();

            return view('cashier.cashier_new_purchase',['transaction'=>$transaction, 'user'=>$user]);
        }
    }

    // =========================================================================
    // Cancel Purchase
    // Deletes the current transaction data
    // =========================================================================
    public function cancelPurchase($id){
        DB::table('sales_reports')->where('sales_report_id', '=', $id)->delete();
        session()->forget('si');
        return redirect()->route('cashier');
    }

    // =========================================================================
    // Cancel Purchase
    // Deletes the current transaction data
    // =========================================================================
    public function removeOrder(Request $request, $id){
        DB::table('orders')->where('order_id', '=', $id)->delete();
        if(session()->has('si')){
            return redirect()->route('cashierNew',$request->session()->get('si'));
        }
        return redirect()->route('cashier');
    }

    // =========================================================================
    // Confirm Purchase
    // Updates the current transaction data
    // =========================================================================
    public function completePurchase(Request $request,$id){
        $orders = DB::table('orders')
                    ->join('products', 'orders.product_id', '=', 'products.product_id')
                    ->select('orders.*', 'products.product_name', 'products.price', 'products.vat')
                    ->where('orders.sales_report_id','=',$id)
                    ->get();

        $vatableAmount = 0;
        $amount = 0;
        foreach($orders as $order){
            if($order->vat == 1){
                $vatableAmount += $order->total_price;
            }
            $amount += $order->total_price;

            DB::table('products')
                ->where('product_id','=',$order->product_id)
                ->decrement('quantity');
        }
        
        DB::table('sales_reports')
            ->where('sales_report_id', $id)
            ->update([
                'total_price' => $amount,
                'cash' => $request->input('cash'),
                'change' => $request->input('change'),
                'vatable_sale' => $vatableAmount/1.12,
                'vat_amount' => ($vatableAmount/1.12) * .12,
                'status' => 1,
        ]);

        session()->forget('si');
        return redirect()->route('cashier');
    }

    // =========================================================================
    // Add Order
    // =========================================================================
    public function addOrder(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'trasId'=>'required',
            'code'=>'required',
            'quantity'=>'required',
            'discount'=>'min:0',
            'type'=>'min:0',
        ]);

        if($validator->fails()){

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);

        }else{

            if($request->input('discount') > 100 && $request->get('type') == 1){
                return response()->json([
                    'status'=>101,
                    'message'=>'Discount must not be greater than 100%.',
                ]);
            }

            $product = DB::table('products')
                        ->where('code','=',$request->input('code'))
                        ->get();
            if($product->count() != 0){
                foreach($product as $prod){
                    $order = new Order;
                    $total = 0;
                    $order->sales_report_id = $id;
                    $order->product_id = $prod->product_id;
                    $order->quantity = $request->input('quantity');
                    $order->discount = $request->input('discount');
                    if($request->input('discount') == null){
                        $order->discount_type = NULL;
                        $total = ($request->input('quantity') * $prod->price);
                    }else if($request->get('type') == 1){
                        $order->discount_type = 1;
                        $discnt = $request->input('discount')/100;
                        $total = ($request->input('quantity') * $prod->price) - (($request->input('quantity') * $prod->price) * $discnt);
                    }else{
                        $order->discount_type = 0;
                        $total = ($request->input('quantity') * $prod->price) - $request->input('discount');
                    }
                    $order->total_price = $total;
                    $order->save();
                }
            }else {
                return response()->json([
                    'status'=>100,
                    'message'=>'No product found!',
                ]);
            }

            return response()->json([
                'status'=>200,
                'message'=>'Product added successfully!',
            ]);
        }
    }

    // =========================================================================
    // Confirm Purchase
    // Updates the current transaction data
    // =========================================================================
    public function fetchOrder($id){
        $orders = DB::table('orders')
                    ->join('products', 'orders.product_id', '=', 'products.product_id')
                    ->select('orders.*', 'products.product_name', 'products.price', 'products.vat')
                    ->where('orders.sales_report_id','=',$id)
                    ->get();

        $vatableAmount = 0;
        $amount = 0;
        foreach($orders as $order){
            if($order->vat == 1){
                $vatableAmount += $order->total_price;
            }
            $amount += $order->total_price;
        }

        $vatableSale = $vatableAmount/1.12;
        $vat = $vatableSale * .12;

        DB::table('sales_reports')
            ->where('sales_report_id', $id)
            ->update([
                'total_price' => $amount,
                'vatable_sale' => $vatableSale,
                'vat_amount' => $vat,
        ]);

        return response()->json([
            'amount'=>$amount,
            'orders'=>$orders,
            'vatableSale'=>round($vatableSale,2),
            'vat'=>round($vat,2),
        ]);
    }







    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewSales()
    {
        return view('cashier.cashier_sales');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
