<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/signup';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function signup(Request $request)
    {
        $password = $request->get('password');
        $re_password = $request->get('re_password');
        $user_email = User::select('email')->where('email', $request->get('email'))->first();
        $user_name = User::select('username')->where('username', $request->get('employee_id'))->first();

        if($password != $re_password)
        {
            return redirect()->route('signup')
            ->with(array(
                'error' => 'Password not match!',
                'employee_id' =>  $request->get('employee_id'),
                'name' =>  $request->get('name'),
                'email' =>  $request->get('email'),
                'password' =>  $request->get('password'),
                're_password' =>  $request->get('re_password')
            ));
        }
        elseif(strlen($password) < 6)
        {
            return redirect()->route('signup')
            ->with(array(
                'error' => 'The password needs to be have at least 6 characters',
                'employee_id' =>  $request->get('employee_id'),
                'name' =>  $request->get('name'),
                'email' =>  $request->get('email'),
                'password' =>  $request->get('password'),
                're_password' =>  $request->get('re_password')
            ));
        }
        elseif($user_email)
        {
            return redirect()->route('signup')
            ->with(array(
                'error' => 'Email already exists',
                'employee_id' =>  $request->get('employee_id'),
                'name' =>  $request->get('name'),
                'email' =>  $request->get('email'),
                'password' =>  $request->get('password'),
                're_password' =>  $request->get('re_password')
            ));
        }
        elseif($user_name)
        {
            return redirect()->route('signup')
            ->with(array(
                'error' => 'User name already exists',
                'employee_id' =>  $request->get('employee_id'),
                'name' =>  $request->get('name'),
                'email' =>  $request->get('email'),
                'password' =>  $request->get('password'),
                're_password' =>  $request->get('re_password')
            ));
        }
        else
        {
            $images_name='';
            $file = $request->file('file-Upload');
            if($file != "")
            {
                $destinationPath = 'images';
                $fileName = $request->get('employee_id') . '.png';
                $request->file('file-Upload')->move($destinationPath, $fileName);
                $images_name = $request->get('employee_id') . '.png';
            }
            else
            {
                $newfile = $request->get('employee_id') . '.png';
                $success = \File::copy(base_path('images\images.png'),base_path('images\\'. $newfile));
                $images_name = $request->get('employee_id') . '.png';
            }

            $_create = User::create([
                'username' => $request->get('employee_id'),
                'employee_id' => $request->get('employee_id'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'location' => 'BPI',
                'images' => $images_name,
                'active' => '1',
            ]);
            //return redirect()->route('home');

            //login
            $input_username=$request->get('employee_id');
            $input_password=$request->get('password');

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
                        $user_info['auth']='user-alt.png';
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
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
