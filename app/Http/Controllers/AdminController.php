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
        
        // return 'Welcome To Admin';
        return view('admin.index');

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
        $number = $data['number'];
        $arr = [];  
        for ($i=0; $i < $number; $i++) 
        { 
            array_push($arr, strtoupper(Str::random(10)));
        }
        // dd($arr);
        foreach ($arr as $a) 
        {
            Voucher::create(['voucher' => $a]);
        }
        return back()->with('status', "Voucher(s) Generated Sucessfully");
    }


}
