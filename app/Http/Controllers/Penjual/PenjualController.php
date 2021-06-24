<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\KomentarPenjual;
use App\Lahan;
use App\SoldOut;
use Auth;
use Storage;

class PenjualController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lahans = Lahan::with('images','user')->where('status_lahan', 1)->where('status_jual', 0)->get();
        // dd($lahans);

        return view('penjual.beranda.index', compact('lahans'));
    }


    public function store(Request $request) { 
        $rule = [
            'content' => 'required'
        ];

        $message = ['required' => 'Form :attribute tidak boleh kosong!'];
        $this->validate($request, $rule, $message);
        $user = KomentarPenjual::create([
            'id_penjual' => $request->id_penjual,
            'content' => $request->content
        ]);

        return redirect()->route('penjual.beranda')->with('message', 'Komentar telah dikirim');
    }


    public function profile()
    {
        $penjual = User::where('id', Auth::user()->id)->first();
        return view('penjual.profile.index', compact('penjual'));
    }

    public function updateProfile(Request $request,$id){
        $penjual = User::findOrFail($id);

        if($request->password){
            $rule = [
                'name' => 'required',
                'no_hp' => 'required',
                'password' => 'required|same:konfirmasi_password',
            ];
    
            $message = [
                'required' => 'Bidang :attribute tidak boleh kosong!',
                'same' => 'Konfirmasi password tidak sama'
            ];
    
            $this->validate($request, $rule, $message);

            $penjual->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'password' => bcrypt($request->password),
            ]);
        }else{
            $rule = [
                'name' => 'required',
                'no_hp' => 'required',
            ];
    
            $message = [
                'required' => 'Form :attribute tidak boleh kosong!',
            ];
    
            $this->validate($request, $rule, $message);

            $penjual->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
            ]);
        }

        return redirect()->route('penjual.profile');
    }

    public function updateFotoProfile(Request $request,$id){
        $penjual = User::findOrFail($id);
        $image = $penjual->image;

        if($request->image){
            $image = $request->file('image')->store('foto_profile_penjual');
            $image_path = $penjual->image;
            if(Storage::exists($image_path)){
                Storage::delete($image_path);
            }
        }

        $penjual->update([
            'image' => $image
        ]);

        return redirect()->route('penjual.profile');
    }
}
