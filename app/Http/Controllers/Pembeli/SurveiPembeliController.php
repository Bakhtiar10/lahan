<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembeli;
use App\Penjual;
Use App\Lahan;
use App\Image;
use App\Survei;
use Auth;
use Validator;

class SurveiPembeliController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $survei = Survei::with('lahan')->where('id_pembeli', Auth::user()->id)->get();
        return view('pembeli.datasurvei.index',compact('survei'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = [
            'foto_ktp'       => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            'tanggal'        => 'required',
            'waktu'          => 'required',
        ];

        $messages = [
            'required' => 'Form :attribute tidak boleh kosong',
            'max' => 'Ukuran gambar harus :max KB'
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if($validation->fails()){
            // dd($validation->errors());
            return redirect()->back()->with('errors', $validation->errors()); 
        } 

        $tanggal = date('Y-m-d', strtotime($request->tanggal));
        $waktu = date("H:i:s", strtotime($request->waktu));
        
        $foto_ktp = $request->file('foto_ktp')->store('foto_ktp');

        $survei = Survei::create([
            'id_lahan'       => $request->id_lahan,
            'id_pembeli'     => $request->id_pembeli,
            'no_hp'          => $request->no_hp,
            'foto_ktp'       => $foto_ktp,
            'tanggal'        => $tanggal,
            'waktu'          => $waktu,

        ]);
        return redirect()->back()->with('message', 'survei telah dikirim!'); 
    }

    public function pesanLahan(Request $request){
        $survei = Survei::findOrFail($request->survei_id);
        
            $survei->status_pesan = $request->status_pesan;
            $survei->save();
        

        return redirect()->back()->with('message', 'Pesan telah terkirim!');
    }


    
}
