<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembeli;
use App\Penjual;
use App\Lahan;
use App\KomentarPembeli;

class PembeliController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }

    public function index()
    {
        $lahan = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
        return view('pembeli.beranda.index',compact('lahan'));
    }

    public function store(Request $request) {
        $pembeli = KomentarPembeli::create([
            'id_pembeli' => $request->id_pembeli,
            'content' => $request->content
        ]);

        return redirect()->route('pembeli.beranda')->with('message', 'Komentar telah dikirim');
    }

}
