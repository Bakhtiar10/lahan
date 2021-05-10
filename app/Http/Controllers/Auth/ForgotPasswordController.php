<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Auth;
use App\User;


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

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $user_check = User::where('email', $request->email)->first();

        if($user_check === null){
            return back()->with('warning', 'Account with this email is not available');
        }else{
            if (!$user_check->verified) {
                return back()->with('warning', 'Your account is not activated. Please activate it first.');
            } else {
                $response = $this->broker()->sendResetLink(
                    $request->only('email')
                );
        
                if ($response === Password::RESET_LINK_SENT) {
                    return back()->with('status', trans($response));
                }
        
                return back()->withErrors(
                    ['email' => trans($response)]
                );
            }
        }
    }
}
