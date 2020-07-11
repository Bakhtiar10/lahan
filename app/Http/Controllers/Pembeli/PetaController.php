<?php

namespace App\Http\Controllers\Pembeli;


use App\Model_Pembeli\Peta;
use App\Model_Penjual\Lahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Storage;

class PetaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pembeli.peta.peta');
    }

   public function peta(){
        $peta = Peta::with('images')->where('status_lahan', 1)->where('status_jual', 0)->get();
        return $peta;
    }


    public function detail_lahan($datalahan)
    {
        $peta = Lahan::find($datalahan);
        return view('pembeli.peta.detail_lahan', compact('peta', 'koments'));
    }

}
