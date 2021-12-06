<?php

namespace App\Http\Controllers;

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
        $quantity = $request->input('product_quantity');
        $description = $request->input('product_description');
        DB::table('products')
        ->insert([
            'product_name' => $name,
            'quantity' => $quantity,
            'price' => $price,
            'product_description' => $description
            ]);
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
        $product = DB::select('select * from products where product_id = ?',[$id]);
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
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $description = $request->input('product_description');
        DB::table('products')
        ->where('product_id', $id)
        ->update([
            'product_name' => $name,
            'quantity' => $quantity,
            'price' => $price,
            'product_description' => $description
            ]);
        $products = DB::select('select * from products');
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
}
