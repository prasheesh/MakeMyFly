<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkEmailExist(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        if($count == 0){
            return 0;
        }else{
            return 1;
        }
    }
    public function checkPwdExist(Request $request)
    {
        $username = $request->email;
        $password = $request->password;
        $credentials = array('profile_mobile_username' => $username , 'password' => $password);
      $attempt = Auth::attempt($credentials);

      return dd($attempt);

        // $count = User::where('password', $request->password)->count();
        // if($count == 0){
        //     return 0;
        // }else{
        //     return 1;
        // }
    }
}
