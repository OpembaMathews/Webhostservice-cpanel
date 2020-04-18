<?php

namespace App\Http\Controllers;

use App\User;
use App\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // I actually need a middleware so a randomd user can't just enter
    }

    /**
     * Show the admin application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users_count = User::count();

        if($user->type == 'admin'){
            return view('admin.index', compact('user','users_count'));
        }
        else{
            return redirect('dashboard');
        }
    }

    public function customers()
    {
        $users = User::all();

        return view('admin.customers.index')->with('users', $users);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->type == 'default')
        {
            $user->delete();
            return back()->with('status', 'User Deleted Successfully');
        }
        return back()->with('error', 'Cannot Delete Admin User');
    }


    public function editUser($id)
    {
        $user = User::find($id);
        
        return view('admin.customers.edit')->with(['user' => $user]);
        
    }

    public function updateUser(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['user_id']);
        if($user)
        {
            $user->name = $data['name'];        
        
            $user->save();

            return back()->with('status', 'User Updated Successfully');
        }
    }

    public function vouchers()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.index',compact('vouchers'));
    }

    public function generate(Request $request)
    {   
        $data = $request->all();
        $number = $data['voucher_number'];
        //$arr = [];  
        for ($i=0; $i < $number; $i++) { 
            //array_push($arr, strtoupper(Str::random(10)));
            Voucher::create([
                'voucher' => strtoupper(Str::random(10)),//$a,
                'host_size'=>$request->host_period,
                'drive_size'=>$request->storage_capacity,
                'type'=>$request->voucher_type
            ]);
        }
        
        // foreach ($arr as $a){
            
        // }

        return response()->json([
            'message'=>'success'
        ]);
    }


}
