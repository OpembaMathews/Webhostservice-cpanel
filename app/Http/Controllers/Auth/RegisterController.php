<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Voucher;

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
                'type'=>'admin'
            ]);

            $this->guard()->login($user);

            return response()->json([
                'redirect'=>'admin/dashboard'
            ]);
        }
        else
        { 
            $count = Voucher::where(['voucher'=>$data['voucher'],'active'=>0])->exists();

            if($count)
            {
                $user =  User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);

                $this->guard()->login($user);

                //change voucher to active
                Voucher::where('voucher',$data['voucher'])->update(['active' => 1]);

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
