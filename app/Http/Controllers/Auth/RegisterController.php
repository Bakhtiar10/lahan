<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Penjual;
use App\Pembeli;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Role;
use App\VerifyMail as VerifyUser;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'role_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min: 8', 'same:password'],
            'no_hp' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/']
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong',
            'string' => 'Form :attribute harus berupa huruf',
            'max' => 'Form :attribute maksimal :max karakter',
            'email' => 'Format :attribute salah',
            'unique' => 'Data :attribute telah terdaftar',
            'min' => 'Form :attribute minimal :min karakter',
            'same' => 'Password dan konfirmasi password harus sama',
            'regex' => 'Format :attribute salah'
        ];

        return Validator::make($data, $rules, $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function showRegistrationForm(){
        $roles = Role::where('role','!=','Admin')->get();
        
        return view('auth.register', compact('roles'));
    }

    protected function create(array $data)
    {
        $user = User::create([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_hp' => $data['no_hp']
        ]);

        $verify_mails = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        \Mail::to($user->email)->send(new VerifyMail($user));

        return $user;

    }

    public function verifyMail($token) {
        $verify_mails = VerifyUser::where('token', $token)->first();
        if(isset($verify_mails)){
            $user = $verify_mails->user;
            if(!$user->verified){
                $verify_mails->user->verified = 1;
                $verify_mails->user->save();
                $status = "Email anda telah diverifikasi. Silahkan Login";
            }else{
                $status = "Email anda telah terverifikasi sebelumnya. Silahkan Login";
            }
        }else{
            return redirect('/login')->with('warning', "Mohon maaf, email anda tidak terdaftar.");
        }
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user){
        $this->guard()->logout();
        return redirect('/login')->with('status', 'Kode verifikasi telah dikirim ke email. Mohon cek email untuk verifikasi.');
    }
}