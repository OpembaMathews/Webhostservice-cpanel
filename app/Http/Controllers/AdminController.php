<?php

namespace App\Http\Controllers;

use App\User;
use App\Voucher;
use App\HostingPlan;
use App\Drive;
use App\DriveCapacity;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $expires;
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

    public function editUser($id)
    {
        $user = User::find($id);
        
        $host = HostingPlan::where('user_id',$id)->get();
        $drive = Drive::where('user_id',$id)->get();
        $drive_capacity = DriveCapacity::where('user_id',$id)->sum('capacity');

        if($user->account_type == 1){
            $account_type = 'Host';
            $this->expires = Carbon::parse($host[0]->updated_at)->addYears($host[0]->host_period)->format('F jS, Y, h:i A');
        }
        else if($user->account_type == 2){
            $account_type = 'Drive';
        }
        else{
            $account_type =  'Host & Drive';
            $this->expires = Carbon::parse($host[0]->updated_at)->addYears($host[0]->host_period)->format('F jS, Y, h:i A');
        }
        
        return view('admin.customers.edit')->with(['user' => $user, 'account_type'=>$account_type,'host'=>$host,'drive'=>$drive,'drive_capacity'=>$drive_capacity,'account_type_number'=>$user->account_type,'expires'=>$this->expires]);
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
        
        for ($i=0; $i < $number; $i++) { 

            if($request->voucher_type == 'host'){
                Voucher::create([
                    'voucher' => strtoupper(Str::random(10)),
                    'host_size'=>$request->host_period,
                    'type'=>$request->voucher_type
                ]);
            }

            if($request->voucher_type == 'drive'){
                Voucher::create([
                    'voucher' => strtoupper(Str::random(10)),
                    'drive_size'=>$request->storage_capacity,
                    'type'=>$request->voucher_type
                ]);
            }

            if($request->voucher_type == 'both'){
                Voucher::create([
                    'voucher' => strtoupper(Str::random(10)),
                    'host_size'=>$request->host_period,
                    'drive_size'=>$request->storage_capacity,
                    'type'=>$request->voucher_type
                ]);
            }
        }
        
        // foreach ($arr as $a){
            
        // }

        return response()->json([
            'message'=>'success'
        ]);
    }


}
