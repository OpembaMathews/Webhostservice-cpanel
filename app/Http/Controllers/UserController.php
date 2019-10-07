<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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


}
