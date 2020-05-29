<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use App\Domain;
use App\User;
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


    public function index(Request $request)
    {
      $user = auth()->user();
      if(Auth::user()->account_type == 1 || Auth::user()->account_type == 3)
        {
          $plan = HostingPlan::where('user_id',Auth::user()->id)->select('host_period','updated_at')->first();
          $expires = Carbon::parse($plan->updated_at)->addYears($plan->host_period)->format('F jS, Y, h:i A');
          $count = Domain::where('user_id',Auth::user()->id)->count();

          return view('home',['count'=>$count,'plan'=>$plan,'expires'=>$expires]);
        }
      else
      {
          return redirect('drive/file/all');
      }

    }



    //Create domain account
    public function createDomainAccount(Request $request)
    {
      $user = auth()->user();
      if(Auth::user()->account_type == 1 || Auth::user()->account_type == 3) {

          $domain_name =$request->input('domain');
          $user = User::find($user->id);
          $user ->domain = $domain_name;
          $user->save();

          if ($domain_name ) {
            error_log($user->email);
            error_log($domain_name);
            $email = $user->email;
            $client = new Client();
            // Send an asynchronous request.
            $link =  'http://127.0.0.1:3004/get?domain='.$domain_name.'&email='.$email;
            // $link =  'http://794b32ba.ngrok.io/get?domain='.$domain_name.'&email='.$email;

            error_log($link);

            $request = new \GuzzleHttp\Psr7\Request('GET', $link, ['connect_timeout' => 80]);
            
            $promise = $client->sendAsync($request)->then(function ($response) {
                
            });
          $promise->wait();

          



          $plan = HostingPlan::where('user_id',Auth::user()->id)->select('host_period','updated_at')->first();
          $expires = Carbon::parse($plan->updated_at)->addYears($plan->host_period)->format('F jS, Y, h:i A');
          $count = Domain::where('user_id',Auth::user()->id)->count();

          return view('accountcreated',['count'=>$count,'plan'=>$plan,'expires'=>$expires]);
            
          }
          

    } else {
      return redirect('drive/file/all');
    }

  }

   
  }
