<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembeli;
use App\Penjual;
use App\Lahan;
use App\KomentarPembeli;
use Auth;
use Storage;

class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lahan = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
        return view('pembeli.beranda.index',compact('lahan'));
    }

    public function store(Request $request) {
        $rule = [
            'content' => 'required'
        ];

        $message = ['required' => 'Form :attribute tidak boleh kosong!'];
        $this->validate($request, $rule, $message);

        $pembeli = KomentarPembeli::create([
            'id_pembeli' => $request->id_pembeli,
            'content' => $request->content
        ]);

        return redirect()->route('pembeli.beranda')->with('message', 'Komentar telah dikirim');
    }

    public function profile()
    {
        $pembeli = Pembeli::where('id', Auth::user()->id)->first();
        return view('pembeli.profile.index', compact('pembeli'));
    }

    public function updateProfile(Request $request,$id){
        $pembeli = Pembeli::findOrFail($id);

        if($request->password){
            $rule = [
                'name' => 'required',
                'no_hp' => 'required',
                'password' => 'required|same:konfirmasi_password',
            ];
    
            $message = [
                'required' => 'Form :attribute tidak boleh kosong!',
                'same' => 'Konfirmasi password tidak sama'
            ];
    
            $this->validate($request, $rule, $message);

            $pembeli->update([
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

            $pembeli->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
            ]);
        }

        return redirect()->route('pembeli.profile');
    }

    public function updateFotoProfile(Request $request,$id){
        $pembeli = Pembeli::findOrFail($id);
        $image = $pembeli->image;

        if($request->image){
            $image = $request->file('image')->store('foto_profile_pembeli');
            $image_path = $pembeli->image;
            if(Storage::exists($image_path)){
                Storage::delete($image_path);
            }
        }

        $pembeli->update([
            'image' => $image
        ]);

        return redirect()->route('pembeli.profile');
    }

}
