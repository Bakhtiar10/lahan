<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
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
    public function redirectTo() {
        $role = Auth::user()->role_id; 

        switch ($role) {
          case 1:
            return 'admin/beranda';
            break;
          case 2:
            return 'beranda';
            break; 
          default:
            return 'admin.beranda'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'   => 'required',
            'password' => 'required|min:6'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'min' => 'Panjang karakter minimal 6'
        ];

        $this->validate($request, $rules, $message);
        
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(Auth::attempt([$fieldType => $request->email, 'password' => $request->password])){
          return $this->sendLoginResponse($request);
        }else{
            return redirect()->route('login')->withErrors('Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function authenticated(Request $request, $user){
      if ($user->verified == false) {
        auth()->logout();
        return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
      }
      return redirect()->intended($this->redirectTo());
    }
}