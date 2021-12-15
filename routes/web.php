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
    if(Auth::user() != NULL){
        if(Auth::user()->role == 1){
            return redirect()->route('home');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('cashier');
        }elseif(Auth::user()->role == 3){
            return redirect()->route('inventory');
        }
    }else{

        return view('auth.login');
    }
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
    Route::get('/cashier/search_product/{code}', [CashierController::class, 'searchProductByCode'])->name('searchProductByCode');
    Route::post('/cashier/complete/{id}', [CashierController::class, 'completePurchase'])->name('completePurchase');
    Route::post('/cashier/add_order/{id}', [CashierController::class, 'addOrder'])->name('addOrder');
    Route::get('/cashier/fetch_order/{id}', [CashierController::class, 'fetchOrder'])->name('fetchOrder');
    Route::get('/cashier/fetch_order_by_id/{id}', [CashierController::class, 'fecthOrdersByID'])->name('fetchOrderById');
    Route::get('/cashier/fetch_sales_by_date/{date}', [CashierController::class, 'fetchSalesByDate'])->name('fetchSalesByDate');

// Admin Routes 
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin_viewUsers');
    Route::get('/admin/users/list', [AdminController::class, 'viewUsersList'])->name('admin_viewUsersList');
    Route::get('/admin/users/add', [AdminController::class, 'addUsers'])->name('admin_addUsers');
    Route::get('/admin/fetch_user', [AdminController::class, 'fetchUsers'])->name('admin_fetchUsers');
    Route::get('/admin/fetch_user/list', [AdminController::class, 'fetchUsersList'])->name('admin_fetchUsersList');
    Route::get('/admin/search_user/{keyword}', [AdminController::class, 'searchUsers'])->name('admin_searchUsers');
    Route::get('/admin/search_user/list/{keyword}', [AdminController::class, 'searchUsersList'])->name('admin_searchUsersList');
    Route::get('/admin/users/update/{id}', [AdminController::class, 'updateUsers'])->name('admin_updateUsers');
    Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->name('admin_storeUsers');
    Route::post('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin_editUser');
    Route::post('/admin/users/remove/{id}', [AdminController::class, 'removeUser'])->name('admin_removeUser');
    Route::get('/admin/forgot_password_reset_defaults', [AdminController::class, 'resetAdmin'])->name('admin_resetAdmin');

// Inventory Routes
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory_create');
Route::get('/inventory/edit/{product}', [InventoryController::class, 'edit'])->name('inventory_edit');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory_update');
Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory_store');
Route::get('/inventory/show/{id}', [InventoryController::class, 'show'])->name('inventory_show');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory_delete');
Route::get('/inventory/search', [InventoryController::class, 'search'])->name('inventory_search');
    //--Inventory Stocks
    Route::get('/inventory_stocks', [InventoryController::class, 'stock_index'])->name('stock');
    Route::get('/inventory/stock_in/{id}', [InventoryController::class, 'stock_in'])->name('stock_in');
    Route::get('/inventory/pull_out/{id}', [InventoryController::class, 'pull_out'])->name('pull_out');
    Route::post('/inventory/add_stock/{id}', [InventoryController::class, 'add_stock'])->name('add_stock');
    Route::post('/inventory/deduct_stock/{id}', [InventoryController::class, 'deduct_stock'])->name('deduct_stock');
    Route::get('/inventory/search_stock', [InventoryController::class, 'search_stock'])->name('search_stock');
    //--Inventory Sales
    Route::get('/inventory_sales', [InventoryController::class, 'sales_index'])->name('inventory_sales');
    Route::get('/inventory_sales/date_range', [InventoryController::class, 'getSalesByRange'])->name('inventory_getSalesByRange');
    Route::get('/inventory_sales/date/{date}', [InventoryController::class, 'getSalesByDate'])->name('inventory_getSalesByDate');
