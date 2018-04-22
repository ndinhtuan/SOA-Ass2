<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Request\LoginRequest;
use Validator;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request){
        // dd($request->all());
        $rule = [
            'email'=> 'required|email',
            'password' => 'required|min:3'
        ];

        $messages = [
            'email.required' => 'Email la truong bat buoc',
            'email.email' => 'Email khong hop le',
            'password.required' => 'Mat khau la truong bat buoc',
            'password.min' => 'mat khau khong du dai'
        ];
        $validator = Validator::make($request->all(), $rule, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->email;
            $password = $request->password;
            $level = $request->level;
            if( Auth::attempt(['email'=> $email,'password'=> $password, 'level' => 1 ])){
                    return view('sinhvien');
            } elseif(Auth::attempt(['email'=> $email,'password'=> $password, 'level' => 2 ])){
                return view('loptruong');
            } elseif(Auth::attempt(['email'=> $email,'password'=> $password, 'level' => 3 ])){
                return view('covan');
            } else {
                return redirect()->back();
            }
        }
    }
}
