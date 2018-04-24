<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Request\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Validator;

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

    hello
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
                
                if (Auth::attempt(['email'=>$email,'password'=>$password])) {
                    $user = Auth::user();
                    Auth::login($user, TRUE);
                    $login_key = md5(rand(1000, 9999) . $user->email);
                    $request->session()->put('login_key', $login_key);
    
                    $level = $user->getAttribute('level');
                    if ($level == 2) {
                        return redirect(route('loptruong'));
                    } 
                    if($level == 1)
                    {
                        return redirect(route('svtaoyc'));
                    }
                    if($level == 3)
                    {
                        return redirect(route('covan'));
                    }
    
                } else {
                    return redirect()->back();
                }
                } 
        
    }
}
