<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Drive;
use Carbon\Carbon;

class FolderController extends Controller
{
	protected $data;
	
    public function __construct(){
    	$this->middleware('auth');
    }

    public function create(Request $request){
    	if($request->filled('folder_name')){
    		Folder::create([
    			'name'=>$request->folder_name,
    			'user_id'=>Auth::user()->id
    		]);

    		$this->data = 'success';
    	}
    	else{
    		$this->data = 'Folder name is required.';
    	}

    	return response()->json([
    		'message'=>$this->data
    	]);
    }

    public function update(Request $request){
        if($request->filled('folder_name')){
            Folder::where('id',$request->folder_id)->update([
                'name'=>$request->folder_name
            ]);

            $this->data = 'success';
        }
        else{
            $this->data = 'All fields are required';
        }
        

        return response()->json([
            'message'=>$this->data
        ]);
    }
}
