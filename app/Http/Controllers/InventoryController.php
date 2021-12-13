<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::select('select * from products');
        return view('inventory', ['product' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.inventory_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input('product_name'));
        request()->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required'
        ]);
        $name = $request->input('product_name');
        $price = $request->input('product_price');
        $code = $request->input('product_code');
        $quantity = $request->input('product_quantity');
        $photo = "images/".$request->input('product_photo');
        $description = $request->input('product_description');
        DB::table('products')
        ->insert([
            'product_name' => $name,
            'code' => $code,
            'quantity' => $quantity,
            'price' => $price,
            'photo' => $photo,
            'product_description' => $description
            ]);
        //dd($photo);
        $products = DB::select('select * from products');
        return redirect()->route('inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::select('select * from products where product_id = ?',[$id]);
        return view('inventory.inventory_show', ['product' => $product[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::select('select * from products where product_id = ?',[$id]);
        //dd($product);
        return view('inventory.inventory_edit', ['product' => $product[0]]);
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
        //dd($request->input('product_name'));
        request()->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required'
        ]);
        $name = $request->input('product_name');
        $code = $request->input('product_code');
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $photo = "images/".$request->input('product_photo');
        $description = $request->input('product_description');
        DB::table('products')
        ->where('product_id', $id)
        ->update([
            'product_name' => $name,
            'code' => $code,
            'quantity' => $quantity,
            'price' => $price,
            'photo' => $photo,
            'product_description' => $description
            ]);
        $products = DB::select('select * from products');
        //dd($photo);
        return redirect()->route('inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('products')->where('product_id', '=', $id)->delete();
        return redirect()->route('inventory');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('product_search');
        //dd($search);
    
        // Search in the title and body columns from the posts table
        //$products = DB::select("select * from products where product_name LIKE ? OR product_description LIKE ?", "'%".$search."%'", "'%".$search."%'");
        $products = DB::table('products')
            ->where('product_name', 'LIKE', '%'.$search.'%') 
            ->orWhere('product_description', 'LIKE', '%'.$search.'%') 
            ->get();
        //dd($products);
        return view('inventory.inventory_search', ['product' => $products]);
    }



    //STOCKS

    public function stock_index()
    {
        //
        $products = DB::select('select * from products');
        return view('inventory_stocks', ['product' => $products]);
    }

    public function stock_in($id)
    {
        $product = DB::select('select * from products where product_id = ?',[$id]);
        return view('inventory.stock_in', ['product' => $product[0]]);
    }

    public function pull_out($id)
    {
        $product = DB::select('select * from products where product_id = ?',[$id]);
        return view('inventory.pull_out', ['product' => $product[0]]);
    }

    public function add_stock(Request $request, $id)
    {
        request()->validate(['stock_add' => 'required']);
        $add_qnty = (int)$request->input('stock_add');
        $qnty = DB::table('products')
            ->where('product_id', $id)
            ->value('quantity');
        $total_qnty = $add_qnty + $qnty;
        DB::table('products')
        ->where('product_id', $id)
        ->update(['quantity' => $total_qnty]);
        $products = DB::select('select * from products');
        return redirect()->route('stock');
    }

    public function deduct_stock(Request $request, $id)
    {
        request()->validate(['stock_deduct' => 'required']);
        $ddct_qnty = (int)$request->input('stock_deduct');
        $qnty = DB::table('products')
            ->where('product_id', $id)
            ->value('quantity');
        $total_qnty = $qnty - $ddct_qnty;
        DB::table('products')
        ->where('product_id', $id)
        ->update(['quantity' => $total_qnty]);
        $products = DB::select('select * from products');
        return redirect()->route('stock');
    }

    public function search_stock(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('stock_search');
        //dd($search);
    
        // Search in the title and body columns from the posts table
        //$products = DB::select("select * from products where product_name LIKE ? OR product_description LIKE ?", "'%".$search."%'", "'%".$search."%'");
        $products = DB::table('products')
            ->where('product_name', 'LIKE', '%'.$search.'%') 
            ->get();
        //dd($products);
        return view('inventory.search_stock', ['product' => $products]);
    }

    public function sales_index()
    {
        //
        $sales= DB::select('select * from sales_reports');
        return view('inventory_viewSales', ['sales' => $sales]);
    }
}
