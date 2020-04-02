<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CurlController;
use App\Domain;

class DomainController extends Controller
{
    use CurlController;

    protected $result;

    public function index(){
    	$domain = Domain::all();
    	return response()->json([
    		'domain'=>$domain,
    		'status'=>200
    	]);
    }

    public function create(Request $request){
        $count = Domain::where('domain',trim($request->domain.''.$request->ext))->count();

        if(!$count){
            $domain = Domain::create([
                'user_id'=>Auth::user()->id,
                'domain'=>$request->domain,
            ]);

            $this->result = $this->postCall($request,Auth::user()->name,'https://hostname.example.com:2087/cpsess##########/json-api/createacct?api.version=1');
        }

    	return response()->json([
            'count'=>$count,
            'result'=>$this->result,
    		'status'=>200
    	]);
    }

    public function show(Request $request){
    	$domain = Domain::where('id',$request->id)->first();

    	return response()->json([
    		'domain'=>$domain,
    		'status'=>200
    	]);
    }

    public function delete(Request $request){
    	Domain::where('id',$request->id)->delete();

    	return response()->json([
    		'message'=>'success',
    		'status'=>200
    	]);
    }
}
