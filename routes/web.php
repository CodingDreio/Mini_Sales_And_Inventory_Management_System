<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');


// Cashier Routes
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier');
Route::get('/cashier/sales/{id}',[CashierController::class, 'viewTodaySale'])->name('cashier_sales');

//Inventory Routes
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory_create');
Route::get('/inventory/edit/{product}', [InventoryController::class, 'edit'])->name('inventory_edit');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory_update');
Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory_store');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory_delete');
//Route::get('products','InventoryController@index');
