<?php

namespace App\Http\Controllers\AuthPembeli;

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
    protected $redirectTo = '/pembeli/beranda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function showPembeliLoginForm()
    {
        return view('authPembeli.login');
    }

    public function pembeliLogin(Request $request)
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
        if (Auth::guard('pembeli')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('pembeli/beranda');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'Email atau password salah',
        ]);;
    }

    public function pembeliLogout(Request $request)
    {
        Auth::guard('pembeli')->logout();
        // $request->session()->invalidate();
        return redirect('/pembeli/login');
        // echo "HAI";
    }
}
