<?php

namespace KazEDU\Http\Controllers\Auth;

use KazEDU\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function authenticateRoles(Request $request)
    {
        $credentials = $request->only('user_roles');

        if (Roles::attempt($credentials)) {
            return redirect()->intended('student.home');
        } else {
            return redirect()->intended('admin.home');
        }

        return view('home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->middleware('roles')->only('home');
    }
}
