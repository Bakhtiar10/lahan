<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Penjual\Penjual;
use App\User;
Use App\KomentarPenjual;

class PenjualController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:penjual');
    }

    public function index()
    {
        return view('penjual.beranda.index');
    }


    public function store(Request $request) {
        $user = KomentarPenjual::create([
            'id_penjual' => $request->id_penjual,
            'content' => $request->content
        ]);

        return redirect()->route('penjual.beranda')->with('message', 'Komentar telah dikirim');
    }
}
