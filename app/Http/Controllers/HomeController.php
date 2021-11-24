<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        
        switch($role){
            case 1:
                return redirect()->route('admin');
                break;
            case 2:
                return redirect()->route('cashier');
                break;
            case 3:
                return redirect()->route('inventory');
                break;
            default:
                return view('login_error');
                break;
        }
    }
}
