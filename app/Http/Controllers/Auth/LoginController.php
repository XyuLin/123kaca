<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginShow()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {   
        $user = $request->only(['email','password']);
        if (Auth::attempt($user)) {
            $data['url'] = $this->redirectTo;
            return $data;
        }else{
            $data['error'] = "错误";
            return $data;
        }
    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
        }
        
        return redirect('/login');
    }
}
