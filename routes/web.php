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
    Route::get('/cashier/new/{si}', [CashierController::class, 'newPurchase'])->name('cashierNew');
    Route::get('/cashier/sales/{id}',[CashierController::class, 'viewSales'])->name('cashier_sales');
    Route::permanentRedirect('/cashier/new', '/cashier');
    Route::permanentRedirect('/cashier/sales', '/cashier');
    // CRUD Routes
    Route::get('/cashier/cancel/{id}', [CashierController::class, 'cancelPurchase'])->name('cancelPurchase');
    Route::get('/cashier/remove-order/{id}', [CashierController::class, 'removeOrder'])->name('removeOrder');
    Route::post('/cashier/complete/{id}', [CashierController::class, 'completePurchase'])->name('completePurchase');
    Route::post('/cashier/add_order/{id}', [CashierController::class, 'addOrder'])->name('addOrder');
    Route::get('/cashier/fetch_order/{id}', [CashierController::class, 'fetchOrder'])->name('fetchOrder');

// Inventory Routes
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory_create');
Route::get('/inventory/edit/{product}', [InventoryController::class, 'edit'])->name('inventory_edit');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory_update');
Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory_store');
Route::get('/inventory/show/{id}', [InventoryController::class, 'show'])->name('inventory_show');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory_delete');
Route::get('/inventory/search', [InventoryController::class, 'search'])->name('inventory_search');
