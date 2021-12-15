<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        return view('home');
    }


// ======================================================================================
//     View Users
// ======================================================================================
    public function viewUsers()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        
        $users = DB::table('users')   
                ->get();
        // dd($users);
        return view('admin.admin_users',['users'=>$users]);
    }


// ======================================================================================
//     View Users
// ======================================================================================
    public function viewUsersList()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        
        $users = DB::table('users')   
                ->get();
        // dd($users);
        return view('admin.admin_users_list',['users'=>$users]);
    }


// ======================================================================================
//     Add Users
// ======================================================================================
    public function addUsers()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        return view('admin.admin_add_users');
    }


// ======================================================================================
//     Shows Update User Form With Information
// ======================================================================================
    public function updateUsers($id)
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }

        $users = DB::table('users')
                    ->where('id','=',$id)
                    ->get();
        return view('admin.admin_update_user',['id'=>$id,'users'=>$users]);
    }


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function storeUser(Request $request)
    {   
        
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }

        // Database query here
        $img = $request->imgInput;
        $imgName = '';

        if($img == null){
            $imgName = 'default.png';
        }else{ 
            $imgName = $request->input('lname').'-'.time().'.'.$request->imgInput->extension();
            
            $request->imgInput->move(public_path('images'),$imgName);
        }

        User::create([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'zip_code' => $request->input('zipcode'),
            'birthdate' => $request->input('bdate'),
            'phone_no' => $request->input('phone'),
            'photo' => $imgName,
            'role' => $request->input('type'),
            'email' => $request->input('email'),
            'password' => Hash::make( $request->get('password') ),
        ]);

        $msg = "User account and information was Created Succesfully!";
        $url = "/admin/users";
        return view('msg.message',['message'=>$msg,'url'=>$url]);
        // return redirect()->route('admin_viewUsers');
    }


// ======================================================================================
//     Update user account to database
// ======================================================================================
    public function editUser(Request $request, $id)
    {
        
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        // Database query here
        // Updates password first
        $pass = $request->input('password');
        if($pass != ''){
            DB::table('users')
                ->where('id',$id)
                ->update([
                    'password' => Hash::make( $pass),
                ]);
        }
        // Updates the rest of information

        $img = $request->imgInput;

        if($img == null){
            $imgName = 'default.png';
        }else{ 
            $imgName = $request->input('lname').'-'.time().'.'.$img->extension();
            $request->imgInput->move(public_path('images'),$imgName);
        }
        DB::table('users')
                ->where('id',$id)
                ->update([
                    'first_name' => $request->input('fname'),
                    'last_name' => $request->input('lname'),
                    'street' => $request->input('street'),
                    'city' => $request->input('city'),
                    'province' => $request->input('province'),
                    'zip_code' => $request->input('zipcode'),
                    'birthdate' => $request->input('bdate'),
                    'phone_no' => $request->input('phone'),
                    'photo' => $imgName,
                    'role' => $request->input('type'),
                    'email' => $request->input('email'),
                ]);
        


        $msg = "User account and information was Updated Succesfully!";
        $url = "/admin/users";
        return view('msg.message',['message'=>$msg,'url'=>$url]);
        // Redirect to view users
        // return redirect()->route('admin_viewUsers');
    }

// ======================================================================================
//     Remove user account
// ======================================================================================
    public function removeUser($id)
    {
        
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 2){
                $url = '/cashier';
                return view('msg.restrict_user',['url'=>$url]);
            }elseif($role == 3){
                $url = '/inventory';
                return view('msg.restrict_user',['url'=>$url]);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        // Database query here
        DB::table('users')
            ->where('id','=',$id)
            ->delete();

        $msg = "User account and information was Removed Succesfully!";
        $url = "/admin/users";
        return view('msg.message',['message'=>$msg,'url'=>$url]);
        // Redirect to view users
        // return redirect()->route('admin_viewUsers');
    }


// ======================================================================================
//     Store new user account to database
// ======================================================================================
    public function searchUsers($keyword)
    {
        $key = strtolower($keyword);
        
        if($key == 'admin' || $key == 'cashier' || $key == 'inventory'){
            if($key == 'admin'){
                $key = '1';
            }elseif($key == 'cashier'){
                $key = '2';
            }elseif($key == 'inventory'){
                $key = '3';
            }
            $users = DB::table('users')
                // ->where('id','!=',$id)    
                ->where('role','=',$key)  
                ->distinct()
                ->get();
        }else {
            // $id = Auth::id();
            $users = DB::table('users')
                    // ->where('id','!=',$id)    
                    ->where('first_name','LIKE','%'.$keyword.'%') 
                    ->orWhere('last_name','LIKE','%'.$keyword.'%')   
                    ->distinct()
                    ->get();
        }
        
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
    public function searchUsersList($keyword)
    {
        $key = strtolower($keyword);
        
        if($key == 'admin' || $key == 'cashier' || $key == 'inventory'){
            if($key == 'admin'){
                $key = '1';
            }elseif($key == 'cashier'){
                $key = '2';
            }elseif($key == 'inventory'){
                $key = '3';
            }
            $users = DB::table('users')
                // ->where('id','!=',$id)    
                ->where('role','=',$key)  
                ->distinct()
                ->get();
        }else {
            // $id = Auth::id();
            $users = DB::table('users')
                    // ->where('id','!=',$id)    
                    ->where('first_name','LIKE','%'.$keyword.'%') 
                    ->orWhere('last_name','LIKE','%'.$keyword.'%')   
                    ->distinct()
                    ->get();
        }
        
        $str='';
        
        if($users->count() > 0){
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
    
                $str .= '<tr onclick="updateUser('.$user->id.')">
                <td class="ps-3">'.$user->first_name.' '.$user->last_name.'</td>
                <td>'.$user->phone_no.'</td>
                <td>'.$user->email.'</td>
                <td>'.$user->street.', '.$user->city.', '.$user->province.', '.$user->zip_code.'</td>
                <td>'.$role.'</td>
                </tr>';
            }
        }else{
            $str = '<tr>
                <td colspan="5" class="text-center">No data found! </td>
                </tr>';
        }

        return response()->json([
            'users' => $users,
            'str' => $str,
        ]);
    }

// ======================================================================================
//     Get user account to database
// ======================================================================================
    public function fetchUsers()
    {
        // Database query here
        
        // $id = Auth::id();
        $users = DB::table('users')
                // ->where('id','!=',$id)    
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
//     Get user account to database return list view
// ======================================================================================
    public function fetchUsersList()
    {
        // Database query here
        
        // $id = Auth::id();
        $users = DB::table('users')
                // ->where('id','!=',$id)    
                ->get();
        $str='';

        if($users->count() > 0){
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
    
                $str .= '<tr onclick="updateUser('.$user->id.')>
                <td class="ps-3">'.$user->first_name.' '.$user->last_name.'</td>
                <td>'.$user->phone_no.'</td>
                <td>'.$user->email.'</td>
                <td>'.$user->street.', '.$user->city.', '.$user->province.', '.$user->zip_code.'</td>
                <td>'.$role.'</td>
                </tr>';
            }
        }else{
            $str .= '<tr>
                <td rowspan="5" class="text-center">No data found! </td>
                </tr>';
        }

        return response()->json([
            'users' => $users,
            'str' => $str,
        ]);
    }




// Creates a new admin account 
    public function resetAdmin()
    {
        DB::table('users')->insert([
            'role' => '1',
            'first_name' => 'Super',
            'last_name' => 'User',
            'street' => '108 M. Almeda Street',
            'city' => 'Pateros',
            'province' => 'Metro Manila',
            'zip_code' => '1620',
            'phone_no' => '(632) 848-5062',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        return redirect()->route('login');
    }








    // public function checkRoleAndLogin($role,$id){
    //     if(Auth::check()){
            //     $role = Auth::user()->role;
            //     if($role == 2){
            //         $url = '/cashier';
            //         return view('msg.restrict_user',['url'=>$url]);
            //     }elseif($role == 3){
            //         $url = '/inventory';
            //         return view('msg.restrict_user',['url'=>$url]);
            //     }else{
            //         return redirect()->route('login');
            //     }
            // }else{
            //     return redirect()->route('login');
            // }
    // }
}
