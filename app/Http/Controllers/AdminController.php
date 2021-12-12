<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        if($userId == null){
            return redirect()->route('login');
        }
        return view('home');
    }


// ======================================================================================
//     View Users
// ======================================================================================
    public function viewUsers()
    {
        
        $userId = Auth::id();

        if($userId == null){
            return redirect()->route('login');
        }
        $id = Auth::id();
        $users = DB::table('users')
                ->where('id','!=',$id)    
                ->get();
        // dd($users);
        return view('admin.admin_users',['users'=>$users]);
    }


// ======================================================================================
//     Add Users
// ======================================================================================
    public function addUsers()
    {
        // dd("HEY");
        return view('admin.admin_add_users');
    }


// ======================================================================================
//     Shows Update User Form 
// ======================================================================================
    public function updateUsers($id)
    {
        // dd("HEY");
        return view('admin.admin_update_user');
    }


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function storeUser(Request $request)
    {
        // Database query here



        // Redirect to view users
        return redirect()->route('admin_viewUsers');
    }


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function editUser(Request $request, $id)
    {
        // Database query here

        

        // Redirect to view users
        return redirect()->route('admin_viewUsers');
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
