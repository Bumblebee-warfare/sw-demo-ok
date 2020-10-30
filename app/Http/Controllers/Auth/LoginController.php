<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function login(Request $request)
    {
        $input_username=$request->get('username');
        $input_password=$request->get('password');
        //dd($input_username);
        if($input_username=="")
        {
            return redirect()->route('login')
            ->with(array('error' => 'Please try again <br> User or password not match!'));
        }
        elseif($input_password=="")
        {
            return redirect()->route('login')
            ->with(array('error' => 'Please try again <br> User or password not match!'));
        }
        else
        {
            $user_info=User::where('employee_id',$input_username)->get()->first();
            if($user_info){
                $credentials=array(
                    'username'=>$user_info['username'],
                    'password'=>$input_password
                );
                
                $auth=Auth::attempt($credentials);
                if($auth == 'true')
                {
                    $user_info['auth']=$auth;
                    \Session::put('user_info', $user_info);
                    return \Redirect::intended('/');
                }
                else
                {
                    $user_info['images']='user-alt.png';
                    $user_info['auth']='false';
                    \Session::put('user_info', $user_info);
                    return redirect()->route('login')
                    ->with(array('error' => 'Please try again <br> User or password not match!'));
                }
            }
            else
            {
                return redirect()->route('login')
                ->with(array('error' => 'Please try again <br> User or password not match!'));
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        $user_info['images']='user-alt.png';
        $user_info['auth']='false';
        \Session::put('user_info', $user_info);
        return redirect()->route('login');
    }
}

