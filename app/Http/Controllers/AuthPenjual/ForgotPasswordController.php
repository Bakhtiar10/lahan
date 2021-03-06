<?php

namespace App\Http\Controllers\AuthPenjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:penjual');
    }

    public function broker()
    {
        return Password::broker('penjuals');
    }

    public function guard(){
        return Auth::guard('penjual');
    }

    public function showLinkRequestForm()
    {
        dd($this->guard());
        return view('authPenjual.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // dd($request->email);
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink($request->only('email'));
        //dd($this->sendResetLinkResponse($request, $response));
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
}
