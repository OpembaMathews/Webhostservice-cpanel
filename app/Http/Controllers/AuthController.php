<?php

namespace App\Http\Controllers;

use App\User;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
            ]))
        {
            $user = User::where('email', $email)->first();
            return redirect('dashboard');

            // if($user->type == 'admin')
            // {
            //     return redirect('admin/dashboard');
            // }
            // else
            // {
            //     return redirect('dashboard');
            // }
            // return redirect()->action('HomeController@index');
            // return 123;
        }
        else
        {
            return back()->with('error', "Login Failed");
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    { //dd($request->voucher);
        // create two new functions one registerAdmin and registerDefault
        // make a check that checks by the voucher and 
        
        if(Str::contains($request->voucher, 'kessingtech'))
        {
            $data = $request->all();
            $user = new User();
            if($request->validate([
                'voucher' => 'required|string|max:50|unique:users', // this checks if a user hasn't used the voucher before
                'name' => 'required|string|min:3|max:250',
                // 'lastname' => 'required|string|min:3|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'password' => 'required|string|min:6',
            ]))
            {
                $user->fill($data);        
                $user->password = bcrypt($user->password);
                $user->voucher = $request->voucher;
                $user->type = 'admin';
                
                $user->save();

                Auth::loginUsingId($user->id);
                return redirect('admin/dashboard');
            }
        }
        else
        {
            // check if voucher exists, if it doesn't return back - This is a work for vueJs
            // $usagecount = User::where('voucher',$request->voucher)->count(); $usagecount < 1 && 
            $availcount = Voucher::where('voucher',$request->voucher)->exists();
            if($availcount)
            {
                $data = $request->all();
                $user = new User();
                if($request->validate([
                    'voucher' => 'required|string|max:50|unique:users', // this checks if a user hasn't used the voucher before
                    'name' => 'required|string|min:3|max:250',
                    // 'lastname' => 'required|string|min:3|max:50',
                    'email' => 'required|string|email|max:50|unique:users',
                    'password' => 'required|string|min:6',
                ]))
                {
                    $user->fill($data);        
                    $user->password = bcrypt($user->password);
                    $user->voucher = $request->voucher;

                    //change voucher to active
                    Voucher::where('voucher',$request->voucher)->update(['active' => 1]);

                    $user->save();


                    Auth::loginUsingId($user->id);
                    return redirect('dashboard');
                }
            }
            else
            {
                return back()->with('status','Voucher Code Unavailable');
            }
        }
        
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }
    
    /**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
    public function getRemind()
    {
        return view('auth.passwords.email');
    }

    /**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
    public function postRemind(Request $request)
    {
        $data = $request->all();
        $hasher = \App::make('hash');
        $reminders = new DatabaseTokenRepository(\DB::connection(), $hasher, \Config::get('auth.passwords.users.table'), \Config::get('app.key'));
        $user = \Password::getUser(['email' => $data['email']]);
        if($user != null)
        {
            $token = $reminders->create($user);
            $data = $user->toArray();
            $data['token'] = $token;

            \Mail::send('emails.reminder', $data, function($mail) use($data){
                $mail->to($data['email'], $data['firstname'].' '.$data['lastname']);
                $mail->from('support@eurekahost.io');
                $mail->subject('Your EurekaHost Password');
            });
        }
        return back()->with('status', \Lang::get("If this email exists, we have sent a password reset. Check your email to continue"));
    }

    /**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return view('auth.passwords.reset')->with('token', $token);
    }

    /**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
    public function postReset(Request $request)
    {
        $data = $request->all();
        // $credentials = Input::only(
        //     'email', 'password', 'password_confirmation', 'token'
        // );
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
            'password_confirmation' => $data['password_confirmation'],
            'token' => $data['token']
        ];

        $response = \Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case \Password::INVALID_PASSWORD:
            case \Password::INVALID_TOKEN:
            case \Password::INVALID_USER:
                return back()->with('error', \Lang::get($response));

            case \Password::PASSWORD_RESET:
                return view('auth.login')->with('success', 'Password Changed Successfully, Proceed to Login');
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->type == 'default')
        {
            $user->delete();
            return back()->with('status', 'User Deleted Successfully');
        }
        return back()->with('error', 'Cannot Delete Admin User');
    }


    public function randomString()
    {
        do
        {
            $random = str_random(60);
            $user = User::where('api_token', $random)->first();
        }
        while(!empty($user));

        return $random;
    }

    // public function comingSoon()
    // {
    //     return Redirect::to('https://pixlypro.kyvio.com/earlybird-v2');
    // }
}
