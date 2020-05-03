<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Drive;
use App\Folder;
use App\DriveCapacity;
use Carbon\Carbon;
use App\Http\Controllers\DriveCapacityTrait;
use Illuminate\Support\Facades\DB;

class DriveController extends Controller
{
    use DriveCapacityTrait;

	protected $drive,$file_type;

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
                $type = strtolower(explode('.',strtolower($request->file_name))[1]);

                if(in_array($type, ['jpg','png','gif','webp','tiff','psd','raw','bmp','heif','indd','jpeg','svg','ai','eps'])){
                    $this->file_type = 'photo';
                }

                if(in_array($type, ['aif','cda','mid','midi','mp3','mpa','ogg','wav','wma','wpl'])){
                    $this->file_type = 'audio';
                }

                if(in_array($type, ['webm','mpg','mp2','mpeg','mpe','mpv','ogg','mp4','m4p','m4v','avi','wmv','mov','qt','flv','swf'])){
                    $this->file_type = 'video';
                }

                if(in_array($type, ['doc','docx','odt','pdf','rtf','tex','txt','wpd','bak','cab','cfg','cpl','cur','dll','dmp','drv','icns','ico','ini','lnk','msi','sys','tmp','ods','xls','xlsm','xlsx','c','class','cpp','cs','h','java','pl','sh','swift','vb','key','odp','pps','ppt','pptx','asp','aspx','cer','cfm','cgi','css','htm','html','js','jsp','part','php','py','rss','xhtml','fnt','eot','fon','otf','ttf','apk','bat','bin','cgi','com','exe','gadget','jar','msi','py','wsf','email','eml','emlx','msg','oft','ost','pst','vcf','csv','dat','db','dbf','log','mdb','sav','sql','tar','xml','bin','dmg','iso','toast','vcd'])){
                    $this->file_type = 'document';
                }

                if(in_array($type, ['7z','arj','deb','pkg','rar','rpm','tar.gz','z','zip'])){
                    $this->file_type = 'compress';
                }

                $drive = Drive::create([
                    'path'=>$path,
                    'name'=>explode('.',$request->file_name)[0],
                    'size'=>$request->file_size,
                    'type'=>$type,
                    'file_type'=>$this->file_type,
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
    	$drive = Drive::where(['user_id'=>Auth::user()->id,'folder_id'=>NULL])->get();

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

    public function getFolder(){
        $folder = Folder::select(DB::raw('folder.*, drive.folder_id, COUNT(*) AS count'))
                        ->join('drive', 'drive.folder_id','=', 'folder.id')
                        ->groupBy('folder.name')
                        ->get();

        return $folder;
    }

    public function getPhoto(){
        $drive = Drive::leftJoin('folder','folder.id','=','drive.folder_id')
                      ->where('drive.user_id',Auth::user()->id)
                      ->whereIn('type',['jpg','png','gif','webp','tiff','psd','raw','bmp','heif','indd','jpeg','svg','ai','eps'])
                      ->select('drive.*','folder.name AS folder_name')
                      ->get();

        return $drive;
    }

    public function getVideo(){
        $drive = Drive::leftJoin('folder','folder.id','=','drive.folder_id')
                      ->where('drive.user_id',Auth::user()->id)
                      ->whereIn('type',['webm','mpg','mp2','mpeg','mpe','mpv','ogg','mp4','m4p','m4v','avi','wmv','mov','qt','flv','swf'])
                      ->select('drive.*','folder.name AS folder_name')
                      ->get();

        return $drive;
    }

    public function getAudio(){
        $drive = Drive::leftJoin('folder','folder.id','=','drive.folder_id')
                      ->where('drive.user_id',Auth::user()->id)
                      ->whereIn('type',['aif','cda','mid','midi','mp3','mpa','ogg','wav','wma','wpl'])
                      ->select('drive.*','folder.name AS folder_name')
                      ->get();

        return $drive;
    }

    public function getDocument(){
        $drive = Drive::leftJoin('folder','folder.id','=','drive.folder_id')
                      ->where('drive.user_id',Auth::user()->id)
                      ->whereIn('type',['doc','docx','odt','pdf','rtf','tex','txt','wpd','bak','cab','cfg','cpl','cur','dll','dmp','drv','icns','ico','ini','lnk','msi','sys','tmp','ods','xls','xlsm','xlsx','c','class','cpp','cs','h','java','pl','sh','swift','vb','key','odp','pps','ppt','pptx','asp','aspx','cer','cfm','cgi','css','htm','html','js','jsp','part','php','py','rss','xhtml','fnt','eot','fon','otf','ttf','apk','bat','bin','cgi','com','exe','gadget','jar','msi','py','wsf','email','eml','emlx','msg','oft','ost','pst','vcf','csv','dat','db','dbf','log','mdb','sav','sql','tar','xml','bin','dmg','iso','toast','vcd'])
                      ->select('drive.*','folder.name AS folder_name')
                      ->get();

        return $drive;
    }

    public function getCompressed(){
        $drive = Drive::leftJoin('folder','folder.id','=','drive.folder_id')
                      ->where('drive.user_id',Auth::user()->id)
                      ->whereIn('type',['7z','arj','deb','pkg','rar','rpm','tar.gz','z','zip'])
                      ->select('drive.*','folder.name AS folder_name')
                      ->get();

        return $drive;
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

    public function getDrive($type,$response_type){
        if(Auth::user()->account_type == 2 || Auth::user()->account_type == 3){
        	$myFile = $this->getMyFiles();
        	$recent = $this->getRecent();
        	$trash = $this->getTrash();
            $folder = $this->getFolder();
            $photo = $this->getPhoto();
            $video = $this->getVideo();
            $audio = $this->getAudio();
            $document = $this->getDocument();
            $compressed = $this->getCompressed();

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
            else if($type == 'photo'){
                $this->drive = $photo;
            }
            else if($type == 'video'){
                $this->drive = $video;
            }
            else if($type == 'audio'){
                $this->drive = $audio;
            }
            else if($type == 'document'){
                $this->drive = $document;
            }
            else if($type == 'compress'){
                $this->drive = $compressed;
            }
        	else{ return abort(404); }

            if($response_type == 'view'){
        	   return view('drive.'.$type,['data'=>$this->drive,'count_all'=>sizeof($myFile),'count_recent'=>sizeof($recent),'count_trash'=>sizeof($trash),'total_storage'=>$sVal[0],'total_usage'=>$uVal[0],'percentage'=>round($percent,0),'folder'=>$folder,'count_photo'=>sizeof($photo),'count_video'=>sizeof($video),'count_audio'=>sizeof($audio),'count_document'=>sizeof($document),'count_compress'=>sizeof($compressed)]);

                //return $this->drive;
            }
            else{
                return $this->drive;
            }
            
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
        $drive = Drive::withTrashed()->where('id',(int)$request->trash_id)->first();

        DriveCapacity::create([
            'd_usage'=> 0 - $drive->size,
            'capacity'=>0,
            'user_id'=>Auth::user()->id
        ]);

        Drive::withTrashed()->where('id',$request->trash_id)->forceDelete();

        return response()->json([
            'message'=>'success',
            'status'=>200
        ]);
    }
}
