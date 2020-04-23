<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\HostingPlan;
use App\Drive;
use App\DriveCapacity;
use App\Voucher;
use App\Domain;
use App\User;

class UserController extends Controller
{
    protected $data = 'success';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        
        return view('user.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $user->update($data);
        return redirect('profile')->with(['message' => 'Account updated successfully']);
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();

        $current_password = $user->password;           
        if(Hash::check($data['current-password'], $current_password))
        {                                 
            $user->password = Hash::make($data['password']);;
            $user->save(); 
            return back()->with(['message' => 'Password Changed successfully']);
        }
        return back()->with(['error' => 'Password Update Failed']);
    }

    public function billing()
    {
        $user = Auth::user();
        $current_plan = "free";
        $invoices = collect();
        return view('user.billing.index', compact('user','current_plan','invoices'));
    }

    public function delete(Request $request){
        HostingPlan::where('user_id',$request->user_id)->delete();
        DriveCapacity::where('user_id',$request->user_id)->forceDelete();
        Voucher::where('user_id',$request->user_id)->delete();
        Domain::where('user_id',$request->user_id)->delete();

        $drive = Drive::where('user_id',$request->user_id)->get();

        foreach ($drive as $d) {
            $delete = Storage::disk('spaces')->delete($d->path);

            if($delete){
                Drive::where('path',$d->path)->forceDelete();

                $this->data = 'success';
            }
            else{
                $this->data = 'Oops! Network error. Please try again';
            }
        }

        User::where('id',$request->user_id)->delete();

        return response()->json([
            'message'=>$this->data
        ]);
    }
}
