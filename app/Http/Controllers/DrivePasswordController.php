<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\DrivePasswordControl;
use App\Drive;

class DrivePasswordController extends Controller
{
	protected $msg,$isLocked,$drive;

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

    public function share(Request $request){
        $dp = DrivePasswordControl::where('drive_code',$request->code)->get();

        if(sizeof($dp)){
            $drive = Drive::where('id',$dp[0]->drive_id)->first();

            if($dp[0]->password){
                $this->isLocked = true;
            }
            else{
                $this->isLocked = false;
            }

            return view('drive.drive-password',['drive'=>$drive,'isLocked'=>$this->isLocked,'code'=>$dp[0]->drive_code]);
        }
        else{
            return abort(404);
        }
    }

    public function check(Request $request){
        $dp = DrivePasswordControl::where('drive_code',$request->code)->first();

        if($request->filled('password')){
            if(Hash::check($request->password,$dp->password)){
                $this->drive = Drive::where('id',$dp->drive_id)->first();
                $this->msg = 'success';
            }
            else {
                $this->msg = 'Wrong passsword, please try again';
            }
        }
        else{
            $this->msg = 'All fields are required';
        }

        return response()->json([
            'drive'=>$this->drive,
            'message'=>$this->msg
        ]);
    }
}
