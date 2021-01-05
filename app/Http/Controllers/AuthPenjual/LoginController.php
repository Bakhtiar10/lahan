<?php

namespace App\Http\Controllers\AuthPenjual;

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
    protected $redirectTo = '/penjual/beranda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:penjual')->except('penjualLogout');
    }

    

    public function showPenjualLoginForm()
    {
        return view('authPenjual.login');
    }

    public function penjualLogin(Request $request)
    {
        $rules = [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'email' => "Format email salah",
            'min' => 'Panjang karakter minimal 6'
        ];

        $this->validate($request, $rules, $message);

        if (Auth::guard('penjual')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/penjual/beranda');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'Email atau password salah',
        ]);;
    }

    public function penjualLogout(Request $request)
    {
        Auth::guard('penjual')->logout();
        $request->session()->invalidate();
        // return redirect('/penjual/login');
        return $this->loggedOut($request) ?: redirect('/penjual/login');
        // echo "HAI";
    }

    // public function guard(){
    //     return Auth::guard('penjual');
    // }
}

