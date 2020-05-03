<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Drive;
use App\DriveCapacity;
use Carbon\Carbon;
use App\Http\Controllers\DriveCapacityTrait;

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
}
