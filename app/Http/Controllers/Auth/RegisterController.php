<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Voucher;
use App\HostingPlan;
use App\DriveCapacity;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'voucher' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = (array) $request->all();

        if($data['voucher'] == 'kessingtech')
        {
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type'=>'admin',
                'voucher'=>$data['voucher'],
                'account_type'=>3
            ]);

            HostingPlan::create([
                'host_period'=>10,
                'user_id'=>$user->id
            ]);

            DriveCapacity::create([
                'capacity'=>1000000000,
                'd_usage'=>0,
                'user_id'=>$user->id
            ]);

            User::where('id',$user->id)->update(['account_type'=>3]);

            $this->guard()->login($user);

            return response()->json([
                'redirect'=>'admin/dashboard'
            ]);
        }
        else
        { 
            $voucher = Voucher::where(['voucher'=>$data['voucher'],'active'=>0])->get();

            if(sizeof($voucher))
            {
                $user =  User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'voucher' => $data['voucher'],
                    'type'=>'customer'
                ]);

                if($voucher[0]->type == 'host'){
                    HostingPlan::create([
                        'host_period'=>$voucher[0]->host_size,
                        'user_id'=>$user->id
                    ]);

                    User::where('id',$user->id)->update(['account_type'=>1]);
                }

                if($voucher[0]->type == 'drive'){
                    DriveCapacity::create([
                        'capacity'=>$voucher[0]->drive_size,
                        'd_usage'=>0,
                        'user_id'=>$user->id
                    ]);

                    User::where('id',$user->id)->update(['account_type'=>2]);
                }

                if($voucher[0]->type == 'both'){
                    HostingPlan::create([
                        'host_period'=>$voucher[0]->host_size,
                        'user_id'=>$user->id
                    ]);

                    DriveCapacity::create([
                        'capacity'=>$voucher[0]->drive_size,
                        'd_usage'=>0,
                        'user_id'=>$user->id
                    ]);

                    User::where('id',$user->id)->update(['account_type'=>3]);
                }

                Voucher::where('voucher',$data['voucher'])->update(['active' => 1,'user_id'=>$user->id]);

                $this->guard()->login($user);

                return response()->json([
                    'redirect'=>'dashboard'
                ]);
            }
            else
            {
                return response()->json([
                    'errors'=>['voucher'=>(array)['Voucher Code doest not exist.']]
                ]);
            }
        }
    }
}
