<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Drive;
use App\DriveCapacity;
use Carbon\Carbon;
use App\Http\Controllers\DriveCapacityTrait;

class DriveController extends Controller
{
    use DriveCapacityTrait;

	protected $drive;

	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	return view('drive.all');
    }

    public function create(Request $request){
    	$path = Storage::disk('spaces')->put('',$request->file('filename'),'public');
        $capacity = DriveCapacity::where('user_id',Auth::user()->id)->sum('capacity');
        $usage = DriveCapacity::where('user_id',Auth::user()->id)->sum('d_usage');
        $unused = $capacity - $usage;

        if($path){
            if($unused > $request->file_size){
                $drive = Drive::create([
                    'path'=>$path,
                    'name'=>explode('.',$request->file_name)[0],
                    'size'=>$request->file_size,
                    'type'=>explode('.',strtolower($request->file_name))[1],
                    'user_id'=>Auth::user()->id
                ]);

                DriveCapacity::create([
                    'd_usage'=> $request->file_size,
                    'capacity'=>0,
                    'user_id'=>Auth::user()->id
                ]);

                $this->data = 'success';
            }
            else{
                $this->data = 'Oops! You do not enough drive space. Buy more space to continue.';
            }
        }
        else{
            $this->data = 'Oops! Network error. Please try again.';
        }
    	
    	return response()->json([
    		'message'=>$this->data,
            'status'=>200
    	]);
    }

    public function show(Request $request){
    	$drive = Drive::where('id',2)->first();
    	$file = Storage::disk('spaces')->url($drive->name);

    	return response()->json(['file'=>$file]);
    }

    public function getMyFiles(){
    	$drive = Drive::where('user_id',Auth::user()->id)->get();

    	return $drive;
    }

    //List files uploaded not more than 7 days
    public function getRecent(){
    	$drive = Drive::where('user_id',Auth::user()->id)->get();
    	$now = Carbon::now();
    	$data = [];


    	foreach ($drive as $d) {
    		if($now->diffInDays($d->created_at) <= 7 ){
    			array_push($data, $d);
    		}
    	}

    	return $data;
    }

    public function getTrash(){
    	$trash = Drive::where('user_id',Auth::user()->id)->onlyTrashed()->get();
        $now = Carbon::now();

        foreach ($trash as $t) {
            if($now->diffInDays($t->deleted_at) >= 7){
                Storage::disk('spaces')->delete($t->path);
                Drive::where('deleted_at',$t->deleted_at)->forceDelete();
            }
        }

    	return $trash;
    }

    public function moveToTrash(Request $request){
        Drive::where('id',$request->trash_id)->delete();

        return response()->json([
            'message'=>'success',
            'status'=>200
        ]);
    }

    public function restore(Request $request){
        Drive::where('id',$request->trash_id)->restore();

        return response()->json([
            'message'=>'success',
            'status'=>200
        ]);
    }

    public function getDrive($type){
        if(Auth::user()->account_type == 2 || Auth::user()->account_type == 3){
        	$myFile = $this->getMyFiles();
        	$recent = $this->getRecent();
        	$trash = $this->getTrash();
            $total_usage = $this->getCapacity('d_usage');
            $total_storage = $this->getCapacity('capacity');

            $uVal = explode('-', $total_usage);
            $sVal = explode('-', $total_storage);

            $percent = ((int)$uVal[1] * 100) / (int)$sVal[1];

        	if($type == 'all'){
        		$this->drive = $myFile;
        	}
        	else if($type == 'recent'){
        		$this->drive = $recent;
        	}
        	else if($type == 'trash'){
        		$this->drive = $trash;
        	}
        	else{ return abort(404); }

        	return view('drive.'.$type,['data'=>$this->drive,'count_all'=>sizeof($myFile),'count_recent'=>sizeof($recent),'count_trash'=>sizeof($trash),'total_storage'=>$sVal[0],'total_usage'=>$uVal[0],'percentage'=>round($percent,0)]);
            
        }
        else{
            return redirect('logout');
        }
    }

    public function download($file){
        $assetPath = Storage::disk('spaces')->url($file);

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . basename($assetPath));
        //header("Content-Type: image/jpeg");

        return readfile($assetPath);
    }

    public function delete(Request $request){
        $delete = Storage::disk('spaces')->delete($request->trash_file);
        $drive = Drive::where('id',(int)$request->trash_id)->first();

        DriveCapacity::create([
            'd_usage'=> 0 - $drive->size,
            'capacity'=>0,
            'user_id'=>Auth::user()->id
        ]);

        Drive::where('id',$request->trash_id)->forceDelete();
        $this->data = 'success';

        return response()->json([
            'message'=>$this->data,
            'status'=>200
        ]);
    }
}
