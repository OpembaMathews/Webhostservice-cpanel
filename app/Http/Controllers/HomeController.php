<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Domain;
use App\HostingPlan;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->account_type == 1 || Auth::user()->account_type == 3){
            $plan = HostingPlan::where('user_id',Auth::user()->id)->select('host_period','updated_at')->first();
            $expires = Carbon::parse($plan->updated_at)->addYears($plan->host_period)->format('F jS, Y, h:i A'); ;
            $count = Domain::where('user_id',Auth::user()->id)->count();
            return view('home',['count'=>$count,'plan'=>$plan,'expires'=>$expires]);
        }
        else{
            return redirect('drive/file/all');
        }
    }
}
