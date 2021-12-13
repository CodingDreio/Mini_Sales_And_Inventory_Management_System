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
        return view('admin.admin_update_user',['id'=>$id]);
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


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function searchUsers($keyword)
    {
        $id = Auth::id();
        $users = DB::table('users')
                ->where('id','!=',$id)    
                ->where('first_name','LIKE','%'.$keyword.'%') 
                ->orWhere('last_name','LIKE','%'.$keyword.'%')   
                ->distinct()
                ->get();
        $str='';
        foreach ($users as $user) {
            if ($user->role == 2){
                $role = "Cashier";
            }
            elseif ($user->role == 3){
                $role = "Inventory";
            }
            elseif ($user->role == 1){
                $role = "Admin";
            }
            $url = asset("images/".$user->photo);

            $str .= '<div class="col-md-12 col-lg-4 col-sm-12 mt-4 d-flex">
                    <div class="card flex-fill shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="'.$url.'" alt="" class="employee-img" alt="Photo">
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="/admin/users/update/'.$user->id.'" class="empUpdateLink">
                                    <h5>'.$user->first_name.' '.$user->last_name.'</h5>
                                    <h6>'.$role.'</h6>
                                </a>
                                <hr>
                                <div class="input-group mb-3">
                                    <span id="phone-icon"><i class="fa fa-phone"></i></span>
                                    <span class="ms-3" id="phone"><h6>'.$user->phone_no.'</h6></span>
                                </div>
                                <div class="input-group mb-3">
                                    <span id="email-icon"><i class="fa fa-envelope"></i></span>
                                    <span class="ms-3" id="email"><h6>'.$user->email.'</h6></span>
                                </div>
                                <div class="input-group mb-3">
                                    <span id="address-icon"><i class="fa fa-map-marker-alt"></i></span>
                                    <span class="ms-3" id="address">
                                        <h6>'.$user->street.', '.$user->city.', '.$user->province.', '.$user->zip_code.'</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }

        return response()->json([
            'users' => $users,
            'str' => $str,
        ]);
    }


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function fetchUsers()
    {
        // Database query here
        
        $id = Auth::id();
        $users = DB::table('users')
                ->where('id','!=',$id)    
                ->get();
        $str='';
        foreach ($users as $user) {
            if ($user->role == 2){
                $role = "Cashier";
            }
            elseif ($user->role == 3){
                $role = "Inventory";
            }
            elseif ($user->role == 1){
                $role = "Admin";
            }
            $url = asset("images/".$user->photo);

            $str .= '<div class="col-md-12 col-lg-4 col-sm-12 mt-4 d-flex">
                    <div class="card flex-fill shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="'.$url.'" alt="" class="employee-img" alt="Photo">
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="/admin/users/update/'.$user->id.'" class="empUpdateLink">
                                    <h5>'.$user->first_name.' '.$user->last_name.'</h5>
                                    <h6>'.$role.'</h6>
                                </a>
                                <hr>
                                <div class="input-group mb-3">
                                    <span id="phone-icon"><i class="fa fa-phone"></i></span>
                                    <span class="ms-3" id="phone"><h6>'.$user->phone_no.'</h6></span>
                                </div>
                                <div class="input-group mb-3">
                                    <span id="email-icon"><i class="fa fa-envelope"></i></span>
                                    <span class="ms-3" id="email"><h6>'.$user->email.'</h6></span>
                                </div>
                                <div class="input-group mb-3">
                                    <span id="address-icon"><i class="fa fa-map-marker-alt"></i></span>
                                    <span class="ms-3" id="address">
                                        <h6>'.$user->street.', '.$user->city.', '.$user->province.', '.$user->zip_code.'</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }

        return response()->json([
            'users' => $users,
            'str' => $str,
        ]);
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
