<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Admin login form
     */
    public function showAdminLoginForm()
    {
        $content_view = "backend.auth.login";
        $data[ 'page_title' ] = "Login";
        $data[ 'menu' ] = "login";

        return view($content_view, $data);
    }


    /**
     * Admin login process
     */
    public function adminLogin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password])) 
        {
            // , @$request->get('remember')
            return redirect()->intended('/admin');
        }
        Session::flash( 'status', 'error' );
        Session::flash( 'message', "Invalid Username or Password");
        return back()->withInput($request->only('username', 'remember'));
    }

}
