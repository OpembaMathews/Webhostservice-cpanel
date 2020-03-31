<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Domain;

class DomainController extends Controller
{
    public function index(){
    	$domain = Domain::all();
    	return response()->json([
    		'domain'=>$domain,
    		'status'=>200
    	]);
    }

    public function create(Request $request){
    	$domain = Domain::create([
    		'user_id'=>Auth::user()->id,
    		'domain'=>$request->domain,
    	]);

    	return response()->json([
    		'domain'=>$domain,
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

    public function check(Request $request){
    	$count = Domain::where('domain',trim($request->domain.''.$request->ext))->count();

    	return response()->json([
    		'count'=>$count,
    		'status'=>200
    	]);
    }

}
