<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\DrivePasswordControl;

class DrivePasswordController extends Controller
{
	protected $msg;

    public function create(Request $request){
    	$dpc = DrivePasswordControl::where('drive_id',$request->drive_id)->count();

    	if($request->filled('password')){
    		if($dpc){
    			$this->update($request);
    		}
    		else{
    			DrivePasswordControl::create([
    				'drive_id'=>$request->drive_id,
    				'password'=>Hash::make($request->password),
    				'drive_code'=>Str::random(5),
    			]);

    			$this->msg = 'success';
    		}
    			 
    	}
		else{
			$this->msg = 'All fields are required';
		}

		return response()->json([
			'message'=>$this->msg
		]);
    }

    public function update(Request $request){
    	$dpc = DrivePasswordControl::where('drive_id',$request->drive_id)->count();

    	if($request->filled('password')){
    		if($dpc){
    			if(strtolower($request->password) == 'remove'){
    				DrivePasswordControl::where('drive_id',$request->drive_id)->update([
	    				'password'=>NULL,
	    			]);

	    			$this->msg = 'success';
    			}
    			else{
    				DrivePasswordControl::where('drive_id',$request->drive_id)->update([
	    				'password'=>Hash::make($request->password),
	    			]);

	    			$this->msg = 'success';
    			}
    		}		 
    	}
		else{
			$this->msg = 'All fields are required';
		}

		return response()->json([
			'message'=>$this->msg
		]);
    }
}
